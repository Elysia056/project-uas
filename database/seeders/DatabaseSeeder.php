<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Richard',
                'email' => 'richard@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'testing',
                'email' => 'testing@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('categories')->insert([
            ['name' => 'Elektronik', 'description' => 'Gadget, laptop, dan perangkat elektronik lainnya', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fashion', 'description' => 'Pakaian, sepatu, dan aksesoris', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rumah & Dapur', 'description' => 'Perabot dan kebutuhan rumah tangga', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Buku', 'description' => 'Buku teks, novel, dan majalah', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Olahraga', 'description' => 'Perlengkapan olahraga dan fitness', 'created_at' => now(), 'updated_at' => now()],
        ]);
        DB::table('products')->insert([
            ['category_id' => 1, 'name' => 'Laptop ASUS VivoBook 15', 'description' => 'Laptop ringan untuk produktivitas', 'price' => 7500000, 'stock' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Smartphone Samsung A54', 'description' => 'HP Android dengan kamera 50MP', 'price' => 4200000, 'stock' => 35, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'TWS Earbuds Xiaomi', 'description' => 'Earbuds wireless dengan bass kuat', 'price' => 350000,  'stock' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Kaos Polos Premium', 'description' => 'Bahan cotton combed 30s', 'price' => 85000, 'stock' => 100,'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Sepatu Sneakers Casual', 'description' => 'Nyaman untuk harian', 'price' => 250000, 'stock' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Rice Cooker Miyako 1.8L', 'description' => 'Masak nasi cepat dan hemat energi', 'price' => 220000, 'stock' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Set Peralatan Makan Stainless','description' => 'Set lengkap piring, mangkok, sendok', 'price' => 175000, 'stock' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'name' => 'Clean Code (Robert Martin)', 'description' => 'Panduan menulis kode yang bersih', 'price' => 120000, 'stock' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Matras Yoga Anti Slip', 'description' => 'Matras yoga tebal 6mm', 'price' => 180000, 'stock' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Dumbbell Set 5kg', 'description' => 'Sepasang dumbbell untuk latihan di rumah','price' => 350000, 'stock' => 18, 'created_at' => now(), 'updated_at' => now()],
        ]);
        DB::table('reviews')->insert([
            ['user_id' => 2, 'product_id' => 1, 'rating' => 5, 'comment' => 'Laptopnya kenceng banget, worth it!', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'product_id' => 1, 'rating' => 4, 'comment' => 'Bagus tapi agak berat dibawa kemana-mana', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'product_id' => 4, 'rating' => 5, 'comment' => 'Kaosnya adem banget, recommended!', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'product_id' => 8, 'rating' => 5, 'comment' => 'Buku wajib buat programmer, isinya daging semua', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}