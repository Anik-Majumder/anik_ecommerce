<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            if (!auth()->check()) {
                return response()->json(['error' => 'You must be logged in to add to cart'], 401);
            }

            $product = Product::findOrFail($request->product_id);

            $cart = Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'new_price' => $product->product_new_price,
                'old_price' => $product->product_old_price,
                'quantity' => $request->quantity ?? 1,
                'size' => $request->size,
                'color' => $request->color,
            ]);

            return response()->json(['message' => 'Product added to cart!', 'data' => $cart]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
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
    public function destroy(Cart $cart)
    {
        //
    }
}
