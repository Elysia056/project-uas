<?php

namespace App\Models;

// DIKERJAKAN OLEH CLARA, Laptop Clara rusak, jadi dia pinjam laptop saya (Richard) untuk mengerjakan tugas ini
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_price', 'status', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}