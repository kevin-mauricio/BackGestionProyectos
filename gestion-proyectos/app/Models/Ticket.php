<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion','comentarios','estado','historia_usuario_id'];

    public function historiaUsuario()
    {
        return $this->belongsTo(HistoriaUsuario::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
