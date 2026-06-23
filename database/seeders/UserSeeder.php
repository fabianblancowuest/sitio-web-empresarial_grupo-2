<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@codebridge.com'],
            [
                'name'              => 'Admin CodeBridge',
                'password'          => Hash::make('Admin@12345'),
                'role'              => 'admin',
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'dev@codebridge.com'],
            [
                'name'              => 'Developer Test',
                'password'          => Hash::make('Dev@12345'),
                'role'              => 'developer',
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@codebridge.com'],
            [
                'name'              => 'User Test',
                'password'          => Hash::make('User@12345'),
                'role'              => 'cliente',
                'email_verified_at' => now(),
            ]
        );
    }
}