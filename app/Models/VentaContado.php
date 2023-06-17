<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaContado extends Model
{
    use HasFactory;
    protected $table = "venta_contado";
    protected $fillable = [
        'id',
        'venta_id',
        'descripcion',
        'descuento',
    ];
}
