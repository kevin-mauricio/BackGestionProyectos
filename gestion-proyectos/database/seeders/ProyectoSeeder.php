<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proyecto::create([
            "nombre" => "Proyecto 1",
            "compania_id" => 1,
        ]);

        Proyecto::create([
            "nombre" => "Proyecto 2",
            "compania_id" => 2,
        ]);

        Proyecto::create([
            "nombre" => "Proyecto 3",
            "compania_id" => 2,
        ]);
    }
}
