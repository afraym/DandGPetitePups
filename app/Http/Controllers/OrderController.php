<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Puppy;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Binafy\LaravelCart\Models\Cart as LaravelCart;
use Nafezly\Payments\Classes\PayPalPayment;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorizeAdmin();

        $orders = Order::with(['user', 'orderItems'])->latest()->paginate(15);

        return view('back.orders.index', compact('orders'));
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
        $cartItems = $user
            ? (LaravelCart::query(['user_id' => $user->id])->first()?->items ?? collect())
            : session()->get('guest_cart', collect());

        if ($cartItems->isEmpty()) {
            return back()->with(['status' => 'Error', 'icon' => 'error', 'message' => 'Your cart is empty']);
        }

        $order = DB::transaction(function () use ($cartItems, $user) {
            // normalize items: ensure we have puppy id, quantity and correct price for both
            // guest (array) and auth (package objects)
            $cartItems = collect($cartItems)->map(function ($item) {
                $itemArray = is_array($item) ? $item : (array) $item;
                $puppyId = $itemArray['itemable_id'] ?? $itemArray['id'] ?? data_get($item, 'itemable.id');
                $puppy = Puppy::find($puppyId);
                $quantity = $itemArray['quantity'] ?? data_get($item, 'quantity', 1);
                $price = $puppy ? $puppy->price : ($itemArray['price'] ?? data_get($item, 'price', 0));
                return [
                    'id' => $puppyId,
                    'quantity' => $quantity,
                    'price' => $price,
                ];
            });

            $totalPrice = collect($cartItems)->sum(function ($item) {
                return data_get($item, 'price', 0) * data_get($item, 'quantity', 1);
            });

            $order = Order::create([
                'user_id' => $user ? $user->id : null,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'puppy_id' => data_get($item, 'id', data_get($item, 'itemable_id')),
                    'quantity' => data_get($item, 'quantity', 1),
                    'price' => data_get($item, 'price', 0),
                ]);
            }

            if ($user) {
                optional(LaravelCart::query(['user_id' => $user->id])->first())->emptyCart();
            } else {
                session()->forget('guest_cart');
            }

            return $order;
        });

        return response()->json(['status' => 'Success', 'icon' => 'success', 'message' => 'Checkout successful', 'order_id' => $order->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $this->authorizeAdmin();

        $order->load(['user', 'orderItems.puppy']);

        return view('back.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $this->authorizeAdmin();

        return redirect()->route('admin.order.show', $order->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $oldStatus = $order->status;

        \DB::transaction(function() use ($order, $validated, $oldStatus) {
            $order->update($validated);

            // If order moved to completed or pending -> mark puppies as sold/reserved (status = 0)
            if (in_array($validated['status'], ['completed','pending']) && !in_array($oldStatus, ['completed','pending'])) {
                foreach ($order->orderItems()->with('puppy')->get() as $item) {
                    $puppy = $item->puppy;
                    if ($puppy) {
                        $puppy->status = 0;
                        $puppy->save();
                    }
                }
            }

            // If order moved to cancelled -> relist puppies (status = 1)
            if ($validated['status'] === 'cancelled' && $oldStatus !== 'cancelled') {
                foreach ($order->orderItems()->with('puppy')->get() as $item) {
                    $puppy = $item->puppy;
                    if ($puppy) {
                        $puppy->status = 1;
                        $puppy->save();
                    }
                }
            }
        });

        return back()->with('success','Order updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $this->authorizeAdmin();

        $order->delete();

        return redirect()->back()->with(['status' => 'Success', 'icon' => 'success', 'message' => 'Order deleted successfully']);
    }

    private function authorizeAdmin(): void
    {
        $user = Auth::user();

        abort_unless($user && ($user->hasRole('admin') || $user->hasRole('super-admin')), 403);
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
