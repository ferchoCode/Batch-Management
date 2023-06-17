<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    protected $table = "paquete";
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'precio',
        'estado',
        'fecha_inicio',
        'fecha_fin',
    ];

    public static function getPaqueteAjax($id){
        return self::where('paquete.id',$id)->get();
    }

}
