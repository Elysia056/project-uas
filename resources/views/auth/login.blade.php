{{-- DIKERJAKAN OLEH: S --}}
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h2>Login</h2>

@if($errors->any())
    <p style="color:red">{{ $errors->first('email') }}</p>
@endif

<form method="POST" action="/login">
    @csrf
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<br>
<p>Belum punya akun? <a href="/register">Register di sini</a></p>
@endsection