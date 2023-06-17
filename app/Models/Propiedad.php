<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;
    protected $table = "propiedad";
    protected $fillable = [
        'id',
        'cod',
        'propietario_id',
        'vendedor_id',
        'nombre',
        'direccion',
        'precio',
        'fotografia',
        'estado',
    ];

    public static function getPropiedad()
    {
        return self::select(
            'propiedad.cod as cod',
            'propiedad.fotografia as fotografia',
            'propiedad.nombre as nombre',
            'propiedad.direccion as direccion',
            'propiedad.precio as precio',
            'propiedad.estado as estado',
            'propietario.nombre as propietarioN',
            'propietario.apellido as propietarioA',
            'vendedor.nombre as vendedorN',
            'vendedor.apellido as vendedorA'
        )
            ->join('propietario', 'propiedad.propietario_id', 'propietario.id')
            ->join('vendedor', 'propiedad.vendedor_id', 'vendedor.id')->get();
    }
}
