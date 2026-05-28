{{-- DIKERJAKAN OLEH: E --}}
@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<h2>Keranjang Belanja</h2>

@if($carts->isEmpty())
    <p>Keranjang kamu kosong<a href="/products">Belanja sekarang</a></p>
@else
    <table border="1" cellpadding="8">
        <tr>
            <th>Produk</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
        @foreach($carts as $cart)
        <tr>
            <td>{{ $cart->product->name }}</td>
            <td>Rp{{ number_format($cart->product->price, 0, ',', '.') }}</td>
            <td>
                <form method="POST" action="/cart/{{ $cart->id }}">
                    @csrf
                    @method('PUT')
                    <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" style="width:50px">
                    <button type="submit">Update</button>
                </form>
            </td>
            <td>Rp{{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
            <td>
                <form method="POST" action="/cart/{{ $cart->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus item ini dari keranjang?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <br>
    <p><strong>Total: Rp{{ number_format($total, 0, ',', '.') }}</strong></p>
    <a href="/orders/create">Checkout Sekarang</a>
@endif
@endsection