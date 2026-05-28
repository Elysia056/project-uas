{{-- DIKERJAKAN OLEH: C --}}
@extends('layouts.app')

@section('title', 'Update Status Pesanan')

@section('content')
<h2>Update Status Pesanan #{{ $order->id }}</h2>

<p><strong>Pelanggan:</strong> {{ $order->user->name }}</p>
<p><strong>Total:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
<p><strong>Status Saat Ini:</strong> {{ ucfirst($order->status) }}</p>

<form method="POST" action="/orders/{{ $order->id }}">
    @csrf
    @method('PUT')

    <label>Status Baru:</label><br>
    <select name="status" required>
        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
        <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
        <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select><br><br>

    <button type="submit">Update Status</button>
    <a href="/orders/{{ $order->id }}">Batal</a>
</form>
@endsection