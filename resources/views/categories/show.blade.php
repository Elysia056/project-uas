{{-- DIKERJAKAN OLEH: R --}}
@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<h2>Detail Kategori</h2>

<p><strong>ID:</strong> {{ $category->id }}</p>
<p><strong>Nama:</strong> {{ $category->name }}</p>
<p><strong>Deskripsi:</strong> {{ $category->description ?? '-' }}</p>

<h3>Produk dalam Kategori Ini</h3>
@if($category->products->isEmpty())
    <p>Belum ada produk di kategori ini</p>
@else
    <ul>
        @foreach($category->products as $product)
            <li><a href="/products/{{ $product->id }}">{{ $product->name }}</a> — Rp{{ number_format($product->price, 0, ',', '.') }}</li>
        @endforeach
    </ul>
@endif

<br>
<a href="/categories/{{ $category->id }}/edit">Edit</a> |
<a href="/categories">Kembali ke Daftar Kategori</a>
@endsection