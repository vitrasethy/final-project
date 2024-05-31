<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', auth()->id())->where('is_purchased', false)->get();

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

    public function checkout(Request $request)
    {
        $carts = Cart::with('product')->where('user_id', auth()->id())->where('is_purchased', false)->get();

        if (empty($carts)) {
            return redirect()->route('product.index')->with('error', 'Your cart is empty');
        }

        $lineItems = [];
        foreach ($carts as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->name
                    ],
                    'unit_amount' => $item->product->price * 100
                ],
                'quantity' => $item->quantity,
            ];
        }

        $stripeSession = $request->user()->checkout($lineItems, [
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('product.index'),
        ]);

        return Inertia::location($stripeSession->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if ($sessionId === null) {
            return;
        }

        $checkoutSession = $request->user()->stripe()->checkout->sessions->retrieve($sessionId);

        if ($checkoutSession->payment_status !== 'paid') {
            return;
        }

        if ($checkoutSession->created < now()->subSeconds(30)->timestamp) {
            throw new NotFoundHttpException();
        }

        $orders = Cart::where('user_id', auth()->id())
            ->where('is_purchased', false)
            ->update(['is_purchased' => true]);

        return Inertia::render('Success', [
            'session' => $checkoutSession,
        ]);
    }
}
