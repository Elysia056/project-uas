<?php

namespace App\Models;

// DIKERJAKAN OLEH: E
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    // Relasi: Wishlist milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Wishlist milik satu Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}