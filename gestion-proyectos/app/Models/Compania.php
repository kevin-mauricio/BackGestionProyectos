<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'nit',
        'telefono',
        'direccion',
        'correo',
    ];


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function proyecto()
    {
        return $this->hasMany(Proyecto::class);
    }
}
