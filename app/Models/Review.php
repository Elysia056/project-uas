<?php

namespace App\Models;

// DIKERJAKAN OLEH: S
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'product_id', 'rating', 'comment'];

    // Relasi: Review milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Review milik satu Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}