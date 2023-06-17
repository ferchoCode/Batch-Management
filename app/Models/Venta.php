<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Venta extends Model
{
    use HasFactory;
    protected $table = "venta";
    protected $fillable = [
        'id',
        'cliente_id',
        'lote_id',
        'fecha_venta',
        'monto',
        'tipo_venta',
    ];


    public static function UptadEstadoeLotes($id)
    {
            DB::select(
                'UPDATE lote SET lote.estado = "Vendido" WHERE lote.id = ?',
                [intval($id)]
            );
    }

    public static function getVentas()
    {
        $ventas = DB::select(
            'SELECT v.id, CONCAT(c.nombre," ",c.apellido)as nombre_completo  ,l.id as lote, v.fecha_venta, v.monto, v.tipo_venta
                    FROM venta  as v
                    INNER JOIN cliente as c
                    ON v.cliente_id= c.id
                    INNER JOIN lote as l
                    ON v.lote_id= l.id'
        );

        return $ventas;
    }

    public static function UptadaEstadoCliente($cliente_id)
    {
        DB::select(
            'UPDATE cliente SET cliente.estado = "Propietario" WHERE cliente.id = ?',
            [intval($cliente_id)]
        );
    }


    
}
