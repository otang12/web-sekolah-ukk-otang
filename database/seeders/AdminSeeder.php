<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@smkn1cijati.sch.id'],
            [
                'name' => 'Admin SMK Negeri 1 Cijati',
                'password' => Hash::make('cijati2026'),
            ]
        );
    }
}