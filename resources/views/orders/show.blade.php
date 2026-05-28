{{-- DIKERJAKAN OLEH: C --}}
@extends('layouts.app')

@section('title', 'Detail Pesanan #{{ $order->id }}')

@section('content')
<h2>Detail Pesanan #{{ $order->id }}</h2>

<p><strong>Tanggal Pesan:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
<p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
<p><strong>Alamat Pengiriman:</strong> {{ $order->address }}</p>

<h3>Item Pesanan</h3>
<table border="1" cellpadding="8">
    <tr>
        <th>Produk</th>
        <th>Harga Satuan</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>
    @foreach($order->orderItems as $item)
    <tr>
        <td><a href="/products/{{ $item->product->id }}">{{ $item->product->name }}</a></td>
        <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
        <td>{{ $item->quantity }}</td>
        <td>Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong>Rp{{ number_format($order->total_price, 0, ',', '.') }}</strong></td>
    </tr>
</table>

<br>
@if(Auth::user()->isAdmin())
    <a href="/orders/{{ $order->id }}/edit">Update Status</a> |
@endif
<a href="/orders">Kembali ke Daftar Pesanan</a>
@endsection