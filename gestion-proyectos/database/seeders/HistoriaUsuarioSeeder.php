<?php

namespace Database\Seeders;

use App\Models\HistoriaUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistoriaUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historias = [
            ["titulo" => "Historia 1 - Carrito de compras", "proyecto_id" => 1],
            ["titulo" => "Historia 2 - Catálogo de productos", "proyecto_id" => 1],
            ["titulo" => "Historia 3 - Gestión de pedidos", "proyecto_id" => 1],
            ["titulo" => "Historia 1 - Autenticación de usuarios", "proyecto_id" => 2],
            ["titulo" => "Historia 2 - Dashboard administrativo", "proyecto_id" => 2],
            ["titulo" => "Historia 1 - Generación de reportes", "proyecto_id" => 3],
        ];

        foreach ($historias as $historia) {
            HistoriaUsuario::create($historia);
        }
    }
}
