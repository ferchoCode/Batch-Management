<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaPaquete extends Model
{
    use HasFactory;
    protected $table = "venta_paquete";
    protected $fillable = [
        'fecha',
        'cantidad',
        'monto',
        'socio_id',
        'paquete_id',
    ];
    public static function getVentaPaquete(){
        return self::select('socio.nombre as socio' , 'paquete.nombre as paquete','venta_paquete.id', 'venta_paquete.fecha','venta_paquete.monto')
        ->join('socio','venta_paquete.socio_id','socio.id')
        ->join('paquete','venta_paquete.paquete_id','paquete.id')
        ->get();
    }
    public static function getServicoPaquete($id){
        return self::select('socio.nombre as socio','servicio.nombre as servicio', 'servicio.precio as precio','venta_paquete.monto')
        ->join('socio','venta_paquete.socio_id','socio.id')
        ->join('servicio_paquete','venta_paquete.paquete_id','servicio_paquete.paquete_id')
        ->join('servicio','servicio_paquete.servicio_id','servicio.id')

        ->where('venta_paquete.id',$id)
        ->get();
    }

    
    
}
