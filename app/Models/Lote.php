<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lote extends Model
{
    use HasFactory;
    protected $table = "lote";
    protected $fillable = [
        'id',
        'coord_A_lat',
        'coord_A_long',
        'coord_B_lat',
        'coord_B_long',
        'coord_C_long',
        'coord_D_lat',
        'coord_D_long',
        'precio',
        'estado',
        'Dimension',
    ];

    public static function findLote($id)
    {
        $lote = Lote::select(
            'id',
            'coord_A_lat',
            'coord_A_long',
            'coord_B_lat',
            'coord_B_long',
            'coord_C_long',
            'coord_D_lat',
            'coord_D_long',
            'precio',
            'dimension',
            'estado'
        )
            ->where('id', $id)
            ->first();

        return $lote;
    }
}
