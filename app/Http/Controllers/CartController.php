<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', auth()->id())->get();

        return Inertia::render('Cart', [
            'carts' => $carts,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'products_id.*' => 'required|exists:products,id',
        ]);

        foreach ($validated['products_id'] as $product_id) {
            $product = Cart::where('product_id', $product_id)->first();
            if ($product) {
                $product->update([
                    'quantity' => ++$product->quantity,
                ]);
            } else {
                Cart::create([
                    'product_id' => $product_id,
                    'user_id' => auth()->id(),
                ]);
            }
        }

        return to_route('carts.index');
    }

    public function show(Cart $cart)
    {
    }

    public function edit(Cart $cart)
    {
    }

    public function update(Request $request, Cart $cart)
    {
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return to_route('carts.index');
    }
}
