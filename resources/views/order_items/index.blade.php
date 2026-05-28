{{-- DIKERJAKAN OLEH: C --}}
@extends('layouts.app')

@section('title', 'Semua Item Pesanan')

@section('content')
<h2>Semua Item Pesanan Saya</h2>

@if($orderItems->isEmpty())
    <p>Belum ada item pesanan.</p>
@else
    <table border="1" cellpadding="8">
        <tr>
            <th>ID Pesanan</th>
            <th>Produk</th>
            <th>Harga Saat Beli</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        @foreach($orderItems as $item)
        <tr>
            <td><a href="/orders/{{ $item->order->id }}">#{{ $item->order->id }}</a></td>
            <td>{{ $item->product->name }}</td>
            <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            <td>{{ $item->created_at->format('d M Y') }}</td>
            <td><a href="/order-items/{{ $item->id }}">Detail</a></td>
        </tr>
        @endforeach
    </table>
@endif
@endsection