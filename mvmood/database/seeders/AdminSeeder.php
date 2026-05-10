<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // php artisan make:seeder 'AdminSeeder'
        User::forceCreate([
            'nickname' => 'admin',
            'email'    => 'soloadmin@institutmvm.cat',
            'password' => Hash::make('soloadmin123'),
            'rol'      => 'admin',
            'email_verified_at' => now(),
        ]);
        // php artisan db:see --class='AdminSeeder'
    }
}
