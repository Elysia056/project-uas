<?php

namespace App\Models;

// DIKERJAKAN OLEH: E
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Relasi: Cart milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Cart milik satu Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Total harga item di cart
    public function subtotal()
    {
        return $this->product->price * $this->quantity;
    }
}
