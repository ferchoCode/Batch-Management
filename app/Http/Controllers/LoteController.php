<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{
    public function index()
    {

        return view('lote.index');
    }


    public function ajaxLote()
    {

        $lote =  DB::table('lote')->get();
        $json  = json_encode($lote, JSON_NUMERIC_CHECK);

        return response($json)->header('Content-Type', 'application/json');
    }

    public function cargaLoteD(Request $request)
    {
        $loteId = $request->input('lote_id');

        $lote = Lote::findLote($loteId);
        // Envía una respuesta al frontend
        return response()->json(['message' => 'Lote ID recibido', 'lote_id' => $lote]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
    }
    public function ajaxReservaVenta($id)
    {
        return DB::select('select r.cliente_id, CONCAT(c.nombre, " ",c.apellido) as nombre_completo, l.id, l.precio from reserva r
        inner join lote l
        on r.lote_id =l.id
        inner join cliente c
        on r.cliente_id= c.id
        where r.id=?',[intval($id)]);

        
        // $json  = json_encode($lote, JSON_NUMERIC_CHECK);
        // return response(json_encode($json))->header('Content-Type', 'application/json');
        
    }
}
