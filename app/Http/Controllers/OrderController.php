<?php

namespace App\Http\Controllers;

// DIKERJAKAN OLEH: C
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Tampilkan semua order milik user
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('orders.index', ['orders' => $orders]);
    }

    // Tampilkan form buat order (checkout)
    public function create()
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect('/cart');
        }

        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('orders.create', ['carts' => $carts, 'total' => $total]);
    }

    // Simpan order baru dan hapus cart
    public function store(Request $request)
    {
        $request->validate([
            'address' => ['required', 'string'],
        ]);

        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect('/cart');
        }

        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        // Buat Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'pending',
            'address' => $request->address,
        ]);

        // Buat OrderItem untuk setiap produk di cart
        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);
        }

        // Kosongkan cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect('/orders/' . $order->id);
    }

    // Tampilkan detail order
    public function show($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        return view('orders.show', ['order' => $order]);
    }

    // Tampilkan form edit status order (admin)
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', ['order' => $order]);
    }

    // Update status order
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:pending,processing,shipped,delivered,cancelled'],
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect('/orders/' . $order->id);
    }

    // Hapus order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect('/orders');
    }
}
