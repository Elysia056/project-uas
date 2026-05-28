{{-- DIKERJAKAN OLEH: R --}}
@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<h2>Edit Produk: {{ $product->name }}</h2>

<form method="POST" action="/products/{{ $product->id }}">
    @csrf
    @method('PUT')

    <label>Kategori:</label><br>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br><br>

    <label>Nama Produk:</label><br>
    <input type="text" name="name" value="{{ old('name', $product->name) }}" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="description" rows="4" cols="40">{{ old('description', $product->description) }}</textarea><br><br>

    <label>Harga (Rp):</label><br>
    <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" step="0.01" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required><br><br>

    <button type="submit">Update Produk</button>
    <a href="/products/{{ $product->id }}">Batal</a>
</form>
@endsection