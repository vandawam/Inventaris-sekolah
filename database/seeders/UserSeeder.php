<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'suprapto1',
            'email' => 'suprapto1@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'suprapto2',
            'email' => 'suprapto2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'suprapto3',
            'email' => 'suprapto3@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'suprapto4',
            'email' => 'suprapto4@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'petugas',
        ]);
    }
}
