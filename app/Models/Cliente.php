<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    protected $fillable = [
        'id',
        'ci',
        'nombre',
        'apellido',
        'telefono',
        'telfono_ref',
        'estado',
    ];


    public static function insertCliente($request)
    {
        // DB::insert(
        //     'INSERT INTO cliente(ci,nombre,apellido,telefeno,telfono_ref)  VALUES(?,?,?,?,?)',
        //     [$request->nombre, $request->apellido,$request->ci, $request->telefono,$request->telefono_ref]
        // );
   

    
        DB::table('cliente')->insert([
            
            'ci' => ($request->ci=='')? $request->ci='' : $request->ci,
            'nombre' =>($request->nombre=='')? $request->nombre='' : $request->nombre,
            'apellido' => ($request->apellido=='')? $request->apellido='' : $request->apellido,
            'telefono' =>  ($request->telefono=='')? $request->telefono='' : $request->telefono,
            'telfono_ref' =>  ($request->telefono_ref=='')? $request->telefono_ref='' : $request->telefono_ref,
        ]);
    }
}
