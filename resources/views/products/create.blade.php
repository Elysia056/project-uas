{{-- DIKERJAKAN OLEH: R --}}
@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<h2>Tambah Produk Baru</h2>

<form method="POST" action="/products">
    @csrf

    <label>Kategori:</label><br>
    <select name="category_id" required>
        <option value="">Pilih Kategori</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br><br>

    <label>Nama Produk:</label><br>
    <input type="text" name="name" value="{{ old('name') }}" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="description" rows="4" cols="40">{{ old('description') }}</textarea><br><br>

    <label>Harga (Rp):</label><br>
    <input type="number" name="price" value="{{ old('price') }}" min="0" step="0.01" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required><br><br>

    <button type="submit">Simpan Produk</button>
    <a href="/products">Batal</a>
</form>
@endsection