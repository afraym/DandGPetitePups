<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puppy;
use \Binafy\LaravelCart\Models\Cart as LaravelCart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        $request->validate([
            'puppy_id' => 'required|integer',
        ]);

        $puppy = Puppy::findOrFail($request->puppy_id);
        
        $user = Auth::user();

        if ($user) {
            // Check if the item already exists in the cart
            $userCart = LaravelCart::query(['user_id' => $user->id])->first();
            if (!$userCart) {
                $cartItem = null;
            } else {
                $cartItem = $userCart->items()->where('itemable_id', $puppy->id)->first();
            }

            if ($cartItem) {
                return response()->json(['status' => 'Information', 'icon' => 'info', 'message' => 'This Puppy already exists in your cart']);
            } else {
                LaravelCart::query()->firstOrCreateWithStoreItems(
                    item: $puppy,
                    quantity: 1,
                    userId: $user->id
                );
            }
        } else {
            // Handle guest cart
            $guestCart = session()->get('guest_cart', collect());
            $cartItem = $guestCart->firstWhere('itemable_id', $puppy->id);

            if ($cartItem) {
                return response()->json(['status' => 'Information', 'icon' => 'info', 'message' => 'This Puppy already exists in your cart']);
            } else {
                $guestCart->push([
                    'itemable_id' => $puppy->id,
                    'quantity' => 1,
                    'name' => $puppy->name,
                    'price' => $puppy->price,
                    'image' => $puppy->puppy_images->isNotEmpty() ? $puppy->puppy_images->first() : null,
                ]);
                session()->put('guest_cart', $guestCart);
            }
        }

        return response()->json(['status'=> 'Success', 'icon' => 'success' ,'message'=> 'Puppy added to cart']);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        if ($user) {
            $cart = LaravelCart::query(['user_id' => $user->id])->first();
            $cartItems = $cart ? $cart->items : collect();
        } else {
            $cartItems = session()->get('guest_cart', collect());
        }

        // Pluck each item with its first puppy image
        $cartItems = $cartItems->map(function ($item) {
            $puppy = Puppy::with(['puppy_images' => function($query) {
            $query->where('priority', 0);
            }])->find(is_array($item) ? $item['itemable_id'] : $item->itemable_id);
            $item['id'] = $puppy->id;
            $item['name'] = $puppy->name;
            $item['price'] = $puppy->price;
            $item['image'] = $puppy->puppy_images->isNotEmpty() ? $puppy->puppy_images->first() : null;
            return (object) $item;
        });
        // dd($cartItems);
        return view('front.cart.show', compact('cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
        ]);

        $user = Auth::user();
        $userCart = LaravelCart::query(['user_id' => $user->id])->first();
        $cartItem = $userCart->items('itemable_id', $request->item_id)->first();
        // $cartItem = LaravelCart::query(['user_id' => $user->id, 'itemable_id' => $request->item_id])->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['status' => 'Success', 'icon' => 'success', 'message' => 'Puppy removed from cart']);
        } else {
            return response()->json(['status' => 'Error', 'icon' => 'error', 'message' => 'Puppy not found in cart']);
        }
    }
}
