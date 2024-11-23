<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ["name" => "Juan Pérez", "email" => "juan.perez@companiaa.com", "password" => Hash::make("12345678"), "compania_id" => 1],
            ["name" => "Ana Gómez", "email" => "ana.gomez@companiab.com", "password" => Hash::make("12345678"), "compania_id" => 2],
            ["name" => "Carlos Ruiz", "email" => "carlos.ruiz@companiac.com", "password" => Hash::make("12345678"), "compania_id" => 3],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
