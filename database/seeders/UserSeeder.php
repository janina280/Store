<?php

namespace Database\Seeders;

use Dotenv\Util\Str;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'usertype'=>'user',
            'password' => Hash::make('password'), 
        ]);
        User::create([
            'name' => 'Test User2',
            'email' => 'test2@example.com',
            'email_verified_at' => now(),
            'usertype'=>'user',
            'password' => Hash::make('password'), 
        ]);

        User::create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'usertype'=>'admin',
            'password' => Hash::make('password'), 
        ]);

    }
}
