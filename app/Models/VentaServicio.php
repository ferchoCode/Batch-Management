<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VentaServicio extends Model
{
    use HasFactory;
    protected $table = "venta_servicio";
    protected $fillable = [
        'cliente',
        'fecha',
        'monto',
        'servicio_id',
    ];

    public static function getVentaServicio(){
        return self::select('venta_servicio.cliente as cliente' , 'servicio.nombre as servicio','venta_servicio.id', 'venta_servicio.fecha','venta_servicio.monto')
        ->join('servicio','venta_servicio.servicio_id','servicio.id')
        ->get();
    }

    public static function saveVentaServicio($request)
    {

        $arrayservicios = $request->arrayservicios;
    
        foreach ($arrayservicios as $servicioid) {

            $precio = DB::table('servicio')->select('servicio.precio')->where('servicio.id',$servicioid)
            ->pluck('precio');

            $ventaservicio = new VentaServicio;
            $ventaservicio->cliente = $request->cliente;
            $ventaservicio->fecha = $request->fecha;
            $ventaservicio->monto = $precio[0];
            $ventaservicio->servicio_id = $servicioid;

            $ventaservicio->save();
        }
    }
}
