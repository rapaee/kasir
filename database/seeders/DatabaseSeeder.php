<?php

namespace Database\Seeders;


use App\Models\Kategori;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'usertype' => 'admin',
            'password' => Hash::make('admin123'), // Hashing password

        ]);


        Kategori::firstOrCreate(['nama_kategori' => 'Makanan']);
        Kategori::firstOrCreate(['nama_kategori' => 'Minuman']);

    }
}
