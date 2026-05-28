<?php

namespace App\Models;

// DIKERJAKAN OLEH: R
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    // Relasi: Category punya banyak Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}