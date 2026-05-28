{{-- DIKERJAKAN OLEH: R --}}
@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<h2>Edit Kategori</h2>

<form method="POST" action="/categories/{{ $category->id }}">
    @csrf
    @method('PUT')

    <label>Nama Kategori:</label><br>
    <input type="text" name="name" value="{{ old('name', $category->name) }}" required><br><br>

    <label>Deskripsi (opsional):</label><br>
    <textarea name="description" rows="3" cols="40">{{ old('description', $category->description) }}</textarea><br><br>

    <button type="submit">Update</button>
    <a href="/categories">Batal</a>
</form>
@endsection