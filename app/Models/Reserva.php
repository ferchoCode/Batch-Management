<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reserva extends Model
{
    use HasFactory;
    protected $table = "reserva";
    protected $fillable = [
        'id',
        'cliente_id',
        'lote_id',
        'fecha_reserva',
        'fecha_expiracion',
        'monto',
        'estado',
    ];

    public static function getReservas()
    {
        $clientes = DB::select(
            'SELECT r.id, CONCAT(c.nombre," ",c.apellido)as nombre_completo  ,l.id as lote, r.fecha_reserva, r.fecha_expiracion, r.monto, r.estado 
                    FROM reserva  as r
                    INNER JOIN cliente as c
                    ON r.cliente_id= c.id
                    INNER JOIN lote as l
                    ON r.lote_id= l.id'
        );

        return $clientes;
    }




    public static function deleteReserva($id)
    {
        DB::select(
            'UPDATE reserva SET reserva.estado = "Anulada" WHERE reserva.id = ?',
            [intval($id)]
        );

        $lote_id = DB::select(
            'SELECT  r.lote_id from reserva r
            inner join lote l
            on r.lote_id = l.id
            where r.id = ?',[intval($id)]
        );
        DB::select(
            'UPDATE lote SET lote.estado = "Disponible" WHERE lote.id = ?',
            [intval($lote_id[0]->lote_id)]
        );

    }

    public static function UptadEstadoeLotes($lotes)
    {
        foreach ($lotes as $elem) {
            DB::select(
                'UPDATE lote SET lote.estado = "Reservado" WHERE lote.id = ?',
                [intval($elem)]
            );
        }
    }

    public static function UptadeReserva($id)
    {
     
            DB::select(
                'UPDATE reserva SET reserva.estado = "Anulada" WHERE reserva.cliente_id = ?',
                [intval($id)]
            );
        
    }
}
