<?php

namespace App\Http\Controllers;

// DIKERJAKAN OLEH: C
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    // Tampilkan semua order item milik user (via order)
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])
            ->whereHas('order', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->get();
        return view('order_items.index', ['orderItems' => $orderItems]);
    }

    // Tampilkan detail satu order item
    public function show($id)
    {
        $orderItem = OrderItem::with(['order', 'product'])->findOrFail($id);
        return view('order_items.show', ['orderItem' => $orderItem]);
    }
}
