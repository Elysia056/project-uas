<?php

namespace App\Http\Controllers;

// DIKERJAKAN OLEH CLARA, Laptop Clara rusak, jadi dia pinjam laptop saya (Richard) untuk mengerjakan tugas ini
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])
            ->whereHas('order', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->get();
        return view('order_items.index', ['orderItems' => $orderItems]);
    }

    public function show($id)
    {
        $orderItem = OrderItem::with(['order', 'product'])->findOrFail($id);
        return view('order_items.show', ['orderItem' => $orderItem]);
    }
}