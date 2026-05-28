<?php

namespace App\Models;

// DIKERJAKAN OLEH: S
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id', 'label', 'street', 'city', 'province', 'postal_code'];

    // Relasi: Address milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
