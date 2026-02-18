<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
{
    \App\Models\User::updateOrCreate(
        ['email' => 'palasti.kft@gmail.com'],
        [
            'name' => 'Admin Levente',
            'password' => \Illuminate\Support\Facades\Hash::make('17811781'),
        ]
    );
}
}
