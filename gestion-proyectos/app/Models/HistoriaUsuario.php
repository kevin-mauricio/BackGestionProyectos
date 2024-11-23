<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaUsuario extends Model
{
    use HasFactory;
    protected $table = 'historias_usuario';
    protected $fillable = [
        'titulo',
        'proyecto_id'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
