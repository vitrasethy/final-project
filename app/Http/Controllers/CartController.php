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
        $carts = Cart::select('*', DB::raw('COUNT(product_id) as quantity'))
            ->where('user_id', auth()->id())
            ->groupBy('product_id')
            ->get();


        return Inertia::render('Cart', [
            'carts' => $carts->load('product'),
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

        $product = collect($validated['products_id'])->map(fn($product_id) => (
        [
            'product_id' => $product_id,
            'user_id' => auth()->id(),
        ]
        ));

        Cart::insert($product->toArray());

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
