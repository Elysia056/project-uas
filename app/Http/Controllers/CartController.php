<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('cart.index', ['carts' => $carts, 'total' => $total]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        // Cek apakah produk sudah ada di cart atau belum
        $existingCart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingCart) {
            $existingCart->quantity += $request->quantity;
            $existingCart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect('/cart');
    }
    public function show($id)
    {
        $cart = Cart::with('product')->findOrFail($id);
        return view('cart.show', ['cart' => $cart]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cart = Cart::findOrFail($id);
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect('/cart');
    }
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect('/cart');
    }
}