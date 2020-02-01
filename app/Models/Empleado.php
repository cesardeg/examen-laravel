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

    public function getSalarioProyectadoAttribute()
    {
        $rate = 0.05;
        $period = 6;
        return number_format($this->salarioDolares * pow(1 + $rate, $period), 2);
    }
}
