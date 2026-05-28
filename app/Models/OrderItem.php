<?php

namespace App\Models;

// DIKERJAKAN OLEH CLARA, Laptop Clara rusak, jadi dia pinjam laptop saya (Richard) untuk mengerjakan tugas ini
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function subtotal()
    {
        return $this->price * $this->quantity;
    }
}