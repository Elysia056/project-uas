{{-- DIKERJAKAN OLEH: E --}}
@extends('layouts.app')

@section('title', 'Detail Wishlist')

@section('content')
<h2>Detail Wishlist</h2>

<p><strong>Produk:</strong> <a href="/products/{{ $wishlist->product->id }}">{{ $wishlist->product->name }}</a></p>
<p><strong>Kategori:</strong> {{ $wishlist->product->category->name }}</p>
<p><strong>Harga:</strong> Rp{{ number_format($wishlist->product->price, 0, ',', '.') }}</p>
<p><strong>Stok:</strong> {{ $wishlist->product->stock }}</p>

<br>
<form method="POST" action="/cart">
    @csrf
    <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit">Tambah ke Keranjang</button>
</form>

<br>
<a href="/wishlist">Kembali ke Wishlist</a>
@endsection