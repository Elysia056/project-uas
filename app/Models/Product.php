<?php

namespace App\Models;

// DIKERJAKAN OLEH: R
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'stock'];

    // Relasi: Product milik satu Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: Product punya banyak Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Relasi: Product punya banyak CartItem
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // Relasi: Product punya banyak OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Rata-rata rating produk
    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}
