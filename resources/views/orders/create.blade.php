{{-- DIKERJAKAN OLEH: C --}}
@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<h2>Checkout</h2>

<h3>Ringkasan Pesanan</h3>
<table border="1" cellpadding="8">
    <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>
    @foreach($carts as $cart)
    <tr>
        <td>{{ $cart->product->name }}</td>
        <td>Rp{{ number_format($cart->product->price, 0, ',', '.') }}</td>
        <td>{{ $cart->quantity }}</td>
        <td>Rp{{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
    </tr>
</table>

<br>
<h3>Alamat Pengiriman</h3>
<form method="POST" action="/orders">
    @csrf
    <textarea name="address" rows="3" cols="50" placeholder="Masukkan alamat lengkap pengiriman..." required>{{ old('address') }}</textarea>
    <br><br>
    <button type="submit">Buat Pesanan</button>
    <a href="/cart">Kembali ke Keranjang</a>
</form>
@endsection