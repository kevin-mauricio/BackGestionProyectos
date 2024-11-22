<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [
            ["descripcion" => "Crear la interfaz del carrito de compras", "comentarios" => "Se debe usar React", "estado" => "En Proceso", "historia_usuario_id" => 1],
            ["descripcion" => "Implementar lógica de carrito", "comentarios" => "Pendiente de validaciones", "estado" => "En Proceso", "historia_usuario_id" => 1],
            ["descripcion" => "Crear página de catálogo", "comentarios" => "Verificar diseño con el cliente", "estado" => "Finalizado", "historia_usuario_id" => 2],
            ["descripcion" => "Optimizar búsqueda en catálogo", "comentarios" => "Prioridad baja", "estado" => "Finalizado", "historia_usuario_id" => 2],
            ["descripcion" => "Configurar roles de usuario", "comentarios" => "Definir permisos específicos", "estado" => "Activo", "historia_usuario_id" => 4],
            ["descripcion" => "Implementar dashboard de métricas", "comentarios" => "Pendiente de mockups", "estado" => "En Proceso", "historia_usuario_id" => 5],
            ["descripcion" => "Generar reportes de ventas", "comentarios" => "Se necesitan datos históricos", "estado" => "Finalizado", "historia_usuario_id" => 6],
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }
    }
}
