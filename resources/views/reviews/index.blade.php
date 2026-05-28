{{-- DIKERJAKAN OLEH: S --}}
@extends('layouts.app')

@section('title', 'Review Aku')

@section('content')
<h2>Review yang Aku Tulis</h2>
<a href="/reviews/create">+ Tulis Review Baru</a>
<br><br>

@if($reviews->isEmpty())
    <p>Kamu belum menulis review apapun</p>
@else
    <table border="1" cellpadding="8">
        <tr>
            <th>Produk</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        @foreach($reviews as $review)
        <tr>
            <td><a href="/products/{{ $review->product->id }}">{{ $review->product->name }}</a></td>
            <td>{{ $review->rating }} / 5</td>
            <td>{{ $review->comment ?? '-' }}</td>
            <td>{{ $review->created_at->format('d M Y') }}</td>
            <td>
                <a href="/reviews/{{ $review->id }}">Detail</a> |
                <form method="POST" action="/reviews/{{ $review->id }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus review ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endif
@endsection