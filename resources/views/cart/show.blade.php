{{-- DIKERJAKAN OLEH: E --}}
@extends('layouts.app')

@section('title', 'Detail Item Keranjang')

@section('content')
<h2>Detail Item Keranjang</h2>

<p><strong>Produk:</strong> {{ $cart->product->name }}</p>
<p><strong>Harga:</strong> Rp{{ number_format($cart->product->price, 0, ',', '.') }}</p>
<p><strong>Jumlah:</strong> {{ $cart->quantity }}</p>
<p><strong>Subtotal:</strong> Rp{{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</p>

<br>
<a href="/cart">Kembali ke Keranjang</a>
@endsection