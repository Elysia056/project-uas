{{-- DIKERJAKAN OLEH: R --}}
@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<h2>Tambah Kategori Baru</h2>

<form method="POST" action="/categories">
    @csrf

    <label>Nama Kategori:</label><br>
    <input type="text" name="name" value="{{ old('name') }}" required><br><br>

    <label>Deskripsi (opsional):</label><br>
    <textarea name="description" rows="3" cols="40">{{ old('description') }}</textarea><br><br>

    <button type="submit">Simpan</button>
    <a href="/categories">Batal</a>
</form>
@endsection