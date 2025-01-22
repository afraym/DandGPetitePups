<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Auth;
use Illuminate\Http\Request;

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
        $cartItems = $user ? LaravelCart::driver('database')->getContent() : collect(session()->get('cart', []));

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

        // Create order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'puppy_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Clear the cart
        if ($user) {
            LaravelCart::driver('database')->clear();
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
}
