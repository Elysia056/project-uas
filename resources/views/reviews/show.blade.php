{{-- DIKERJAKAN OLEH: S --}}
@extends('layouts.app')

@section('title', 'Detail Review')

@section('content')
<h2>Detail Review</h2>

<p><strong>Produk:</strong> <a href="/products/{{ $review->product->id }}">{{ $review->product->name }}</a></p>
<p><strong>Ditulis oleh:</strong> {{ $review->user->name }}</p>
<p><strong>Rating:</strong> {{ $review->rating }} / 5</p>
<p><strong>Komentar:</strong> {{ $review->comment ?? '-' }}</p>
<p><strong>Tanggal:</strong> {{ $review->created_at->format('d M Y H:i') }}</p>

<br>
@if(Auth::id() === $review->user_id)
    <form method="POST" action="/reviews/{{ $review->id }}" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Hapus review ini?')">Hapus Review</button>
    </form>
    |
@endif
<a href="/reviews">Kembali ke Daftar Review</a>
@endsection