{{-- DIKERJAKAN OLEH: C --}}
@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<h2>Daftar Pesanan Saya</h2>

@if($orders->isEmpty())
    <p>Anda belum punya pesanan. <a href="/products">Mulai belanja</a></p>
@else
    <table border="1" cellpadding="8">
        <tr>
            <th>ID Pesanan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->created_at->format('d M Y') }}</td>
            <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>
                <a href="/orders/{{ $order->id }}">Detail</a>
                @if($order->status === 'pending')
                    |
                    <form method="POST" action="/orders/{{ $order->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Batalkan pesanan ini?')">Batalkan</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
@endif
@endsection