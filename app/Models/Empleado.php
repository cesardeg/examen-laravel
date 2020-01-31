<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'codigo', 'nombre',
        'salarioDolares', 'salarioPesos',
        'direccion', 'estado', 'ciudad',
        'telefono', 'correo', 'activo',
    ];
    const DELETED_AT = 'eliminado';
}
