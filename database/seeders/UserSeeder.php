<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Raden Febri',
            'username' => 'radenfebri',
            'role' => 'Admin',
            'email' => 'febriye12@gmail.com',
            'password' => bcrypt('Febri2303'),
        ]);

        User::create([
            'name' => 'User',
            'username' => 'user',
            'role' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('Febri2303'),
        ]);
    }
}
