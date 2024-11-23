<?php

namespace Database\Seeders;

use App\Models\Compania;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compania::create([
            "nombre" => "Compañía A",
            "nit" => "123456789",
            "telefono" => "111-222-333",
            "direccion" => "Calle 1 #2-3",
            "correo" => "contacto@companiaa.com",
        ]);

        Compania::create([
            "nombre" => "Compañía B",
            "nit" => "987654321",
            "telefono" => "444-555-666",
            "direccion" => "Calle 4 #5-6",
            "correo" => "contacto@companiab.com",
        ]);

        Compania::create([
            "nombre" => "Compañía C",
            "nit" => "456789123",
            "telefono" => "777-888-999",
            "direccion" => "Calle 7 #8-9",
            "correo" => "contacto@companiac.com",
        ]);
    }
}
