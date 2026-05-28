{{-- DIKERJAKAN OLEH: S --}}
@extends('layouts.app')

@section('title', 'Tulis Review')

@section('content')
<h2>Tulis Review Produk</h2>

<form method="POST" action="/reviews">
    @csrf

    <label>Pilih Produk:</label><br>
    <select name="product_id" required>
        <option value="">Pilih Produk</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach
    </select><br><br>

    <label>Rating (1–5):</label><br>
    <select name="rating" required>
        @for($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select><br><br>

    <label>Komentar (opsional):</label><br>
    <textarea name="comment" rows="4" cols="50">{{ old('comment') }}</textarea><br><br>

    <button type="submit">Kirim Review</button>
    <a href="/reviews">Batal</a>
</form>
@endsection