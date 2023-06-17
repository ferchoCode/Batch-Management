<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServicioPaquete extends Model
{
    use HasFactory;
    protected $table = "servicio_paquete";
    protected $fillable = [
        'servicio_id',
        'paquete_id',
    ];


    public static function procServicoPaquete($arrayservicios, $paqueteid)
    {
        
        foreach ($arrayservicios as $servicioid) {
            $serviciopaquete = new ServicioPaquete;
            $serviciopaquete->servicio_id= $servicioid;
            $serviciopaquete->paquete_id=$paqueteid;
            $serviciopaquete->save();
        }
        // $servicio = array_map('intval', $arrayservicios);
        
        // DB::select(
        //     'CALL sp_insertar_servicios_en_paquete(?,?)',
        //     array($arrayservicios,$i dpaquete)
        // );
    } 

    public static function getServicoPaquete($id){
        return self::select('servicio.nombre' , 'servicio.descripcion')
        ->join('servicio','servicio_paquete.servicio_id','servicio.id')
        ->join('paquete','servicio_paquete.paquete_id','paquete.id')

        ->where('servicio_paquete.paquete_id',$id)
        ->groupBy('servicio.nombre','servicio.descripcion')
        ->get();
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
       
    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'paquete_id');
    }
}


