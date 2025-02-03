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
            'name' => 'suprapto',
            'email' => 'suprapto@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'supratman',
            'email' => 'supratman@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'sucipto',
            'email' => 'sucipto@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'srikansa',
            'email' => 'srikansa@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'aripudin',
            'email' => 'aripudin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'teknisi',
        ]);
        User::create([
            'name' => 'agus',
            'email' => 'agus@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'teknisi',
        ]);
        User::create([
            'name' => 'asri',
            'email' => 'asri@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
            'role' => 'teknisi',
        ]);
    }
}
