{{-- DIKERJAKAN OLEH: R --}}
@extends('layouts.app')

@section('title', 'Semua Kategori')

@section('content')
<h2>Daftar Kategori</h2>
<a href="/categories/create">+ Tambah Kategori Baru</a>
<br><br>

@if($categories->isEmpty())
    <p>Belum ada kategori.</p>
@else
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Jumlah Produk</th>
            <th>Aksi</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description ?? '-' }}</td>
            <td>{{ $category->products->count() }}</td>
            <td>
                <a href="/categories/{{ $category->id }}">Lihat</a> |
                <a href="/categories/{{ $category->id }}/edit">Edit</a> |
                <form method="POST" action="/categories/{{ $category->id }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endif
@endsection