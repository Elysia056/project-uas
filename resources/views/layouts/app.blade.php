<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ShopKita, @yield('title', 'E-Commerce')</title>
</head>
<body>

<h2>🛒 Ecommerce Amazon</h2>
<hr>

@if(Auth::check())
    <p>
        Halo, <strong>{{ Auth::user()->name }}</strong> |
        <a href="/products">Produk</a> |
        <a href="/categories">Kategori</a> |
        <a href="/cart">Keranjang</a> |
        <a href="/wishlist">Wishlist</a> |
        <a href="/orders">Pesanan</a> |
        <a href="/reviews">Review Saya</a> |
        <form method="POST" action="/logout" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </p>
@else
    <p>
        <a href="/login">Login</a> |
        <a href="/register">Register</a>
    </p>
@endif

<hr>

@if(session('success'))
    <p style="color:green"><strong>{{ session('success') }}</strong></p>
@endif

@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@yield('content')

<hr>

</body>
</html>