{{-- DIKERJAKAN OLEH: E --}}
@extends('layouts.app')

@section('title', 'Wishlist Saya')

@section('content')
<h2>Wishlist Saya</h2>

@if($wishlists->isEmpty())
    <p>Wishlist anda kosong. <a href="/products">Lihat produk</a></p>
@else
    <table border="1" cellpadding="8">
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($wishlists as $wishlist)
        <tr>
            <td><a href="/products/{{ $wishlist->product->id }}">{{ $wishlist->product->name }}</a></td>
            <td>Rp{{ number_format($wishlist->product->price, 0, ',', '.') }}</td>
            <td>{{ $wishlist->product->stock }}</td>
            <td>
                <form method="POST" action="/cart">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit">Pindah ke Keranjang</button>
                </form>
                <form method="POST" action="/wishlist/{{ $wishlist->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus dari wishlist?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endif
@endsection