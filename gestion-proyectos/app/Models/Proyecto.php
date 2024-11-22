<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','compania_id'];


    public function compania()
    {
        return $this->belongsTo(Compania::class);
    }

    public function historiaUsuario()
    {
        return $this->hasMany(HistoriaUsuario::class);
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
