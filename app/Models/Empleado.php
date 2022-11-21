<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificacion',
        'nombres',
        'apellidos',
        'direccion',
        'telefono',
        'departamentoNacimiento',
        'ciudadNacimiento',
    ];
}
