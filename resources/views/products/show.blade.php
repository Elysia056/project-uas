{{-- DIKERJAKAN OLEH: R --}}
@extends('layouts.app')

@section('title', $product->name)

@section('content')
<h2>{{ $product->name }}</h2>

<p><strong>Kategori:</strong> {{ $product->category->name }}</p>
<p><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
<p><strong>Stok:</strong> {{ $product->stock }}</p>
<p><strong>Deskripsi:</strong> {{ $product->description ?? '-' }}</p>
<p><strong>Rating:</strong> {{ number_format($product->averageRating(), 1) }} / 5</p>

<br>
{{-- Tambah ke Cart --}}
<form method="POST" action="/cart">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <label>Jumlah:</label>
    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
    <button type="submit">Tambah ke Keranjang</button>
</form>

<br>

{{-- Tambah ke Wishlist --}}
<form method="POST" action="/wishlist">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit">+ Tambah ke Wishlist</button>
</form>

<br>
<hr>
<h3>Review Produk ({{ $product->reviews->count() }})</h3>

@if($product->reviews->isEmpty())
    <p>Belum ada review.</p>
@else
    @foreach($product->reviews as $review)
        <p>
            <strong>{{ $review->user->name }}</strong> — Rating: {{ $review->rating }}/5<br>
            {{ $review->comment ?? '-' }}<br>
            <small>{{ $review->created_at->format('d M Y') }}</small>
        </p>
        <hr>
    @endforeach
@endif

<a href="/reviews/create">Tulis Review untuk Produk Ini</a>

<br><br>
<a href="/products">Kembali ke Daftar Produk</a>
@endsection