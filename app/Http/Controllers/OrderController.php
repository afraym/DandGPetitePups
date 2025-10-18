<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Auth;
use Illuminate\Http\Request;
use \Binafy\LaravelCart\Models\Cart as LaravelCart;
use Nafezly\Payments\Classes\PayPalPayment;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $cart = LaravelCart::query(['user_id' => $user->id])->first();
            $cartItems = $cart ? $cart->items : collect();
        } else {
            $cartItems = session()->get('guest_cart', collect());
        }


        if ($cartItems->isEmpty()) {
            return back()->with(['status' => 'Error', 'icon' => 'error', 'message' => 'Your cart is empty']);
        }

        // Calculate total price
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Create order
        $order = Order::create([
            'user_id' => $user ? $user->id : null,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        redirect($this->payWithPaypal($request,100));

        // Create order items
        foreach ($cartItems as $item) {
            Order::create([
                'order_id' => $order->id,
                'puppy_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        
        // Clear the cart
        if ($user) {
            LaravelCart::query(['user_id' => $user->id])->first()->emptyCart();
        } else {
            session()->forget('cart');
        }

        return response()->json(['status' => 'Success', 'icon' => 'success', 'message' => 'Checkout successful', 'order_id' => $order->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    
    public function payWithPaypal(Request $request, $amount){
        $payment = new PayPalPayment();
        $response = $payment->setAmount($amount)->pay();  
        
        if (isset($response['redirect_url'])) {

            // die($response['redirect_url']);
        //    redirect()->to("https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=");
          return $response['redirect_url'];
        }
        
        // dd($response);
        //output
        //[
        //    'payment_id'=>"", // reference code that should be stored in your orders table
        //    'redirect_url'=>"", // redirect url available for some payment gateways
        //    'html'=>"" // rendered html available for some payment gateways
        //]
    }

    public function verifyWithPaypal(Request $request){
        $payment = new PayPalPayment();
        $response = $payment->verify($request);
        
        
        dd($response);
        //output
        //[
        //    'success'=>true,//or false
        //    'payment_id'=>"PID",
        //    'message'=>"Done Successfully",//message for client
        //    'process_data'=>""//payment response
        //]
    }

    public function payment_verify(Request $request){
        $this->verifyWithPaypal($request);
    }
}
