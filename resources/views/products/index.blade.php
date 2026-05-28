{{-- DIKERJAKAN OLEH: R --}}
@extends('layouts.app')

@section('title', 'Semua Produk')

@section('content')
<h2>Daftar Produk</h2>

@if(Auth::user()->isAdmin())
    <a href="/products/create">+ Tambah Produk Baru</a>
    <br><br>
@endif

@if($products->isEmpty())
    <p>Belum ada produk tersedia.</p>
@else
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="/products/{{ $product->id }}">Detail</a>
                @if(Auth::user()->isAdmin())
                    | <a href="/products/{{ $product->id }}/edit">Edit</a> |
                    <form method="POST" action="/products/{{ $product->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endif
@endsection