<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Grupo;

use App\Models\Inscripcion;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
          $reportes = DB::select('SELECT c.nombre, c.apellido, c.ci, COUNT(r.lote_id) AS cantidad, r.fecha_reserva AS fecha, r.estado 
          FROM cliente c 
          INNER JOIN reserva r ON c.id = r.cliente_id 
          GROUP BY c.nombre, c.apellido, c.ci, r.fecha_reserva, r.estado 
              UNION 
          SELECT c2.nombre, c2.apellido, c2.ci, COUNT(v.lote_id) AS cantidad, v.fecha_venta AS fecha, c2.estado 
          FROM cliente c2 
          INNER JOIN venta v ON c2.id = v.cliente_id 
          WHERE c2.estado = "Propietario" 
          GROUP BY c2.nombre, c2.apellido, c2.ci, v.fecha_venta, c2.estado 
          ORDER BY nombre ASC');

            return view('reporte.index', compact('reportes'));
    }

  
}
