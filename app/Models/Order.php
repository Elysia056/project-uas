<?php

namespace App\Models;

// DIKERJAKAN OLEH: C
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_price', 'status', 'address'];

    // Relasi: Order milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Order punya banyak OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}