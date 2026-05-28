<?php

namespace App\Models;

// DIKERJAKAN OLEH: C
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Relasi: OrderItem milik satu Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi: OrderItem milik satu Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Subtotal per item
    public function subtotal()
    {
        return $this->price * $this->quantity;
    }
}