{{-- DIKERJAKAN OLEH: S --}}
@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h2>Register Akun Baru</h2>

<form method="POST" action="/register">
    @csrf
    <label>Nama Lengkap:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Konfirmasi Password:</label><br>
    <input type="password" name="password_confirmation" required><br><br>

    <button type="submit">Daftar</button>
</form>

<br>
<p>Sudah punya akun? <a href="/login">Login di sini</a></p>
@endsection