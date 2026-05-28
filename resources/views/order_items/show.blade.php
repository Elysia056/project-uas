{{-- DIKERJAKAN OLEH: C --}}
@extends('layouts.app')

@section('title', 'Detail Item Pesanan')

@section('content')
<h2>Detail Item Pesanan</h2>

<p><strong>ID:</strong> {{ $orderItem->id }}</p>
<p><strong>Pesanan:</strong> <a href="/orders/{{ $orderItem->order->id }}">#{{ $orderItem->order->id }}</a></p>
<p><strong>Produk:</strong> <a href="/products/{{ $orderItem->product->id }}">{{ $orderItem->product->name }}</a></p>
<p><strong>Harga saat beli:</strong> Rp{{ number_format($orderItem->price, 0, ',', '.') }}</p>
<p><strong>Jumlah:</strong> {{ $orderItem->quantity }}</p>
<p><strong>Subtotal:</strong> Rp{{ number_format($orderItem->price * $orderItem->quantity, 0, ',', '.') }}</p>
<p><strong>Status Pesanan:</strong> {{ ucfirst($orderItem->order->status) }}</p>

<br>
<a href="/order-items">Kembali ke Daftar Item</a> |
<a href="/orders/{{ $orderItem->order->id }}">Lihat Pesanan</a>
@endsection