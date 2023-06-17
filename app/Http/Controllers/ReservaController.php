<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::getReservas();
        return view('reserva.index', compact('reservas'));
    }

    public function ajaxGetCliente()
    {
        $clientes =  DB::table('cliente')->get();

        return response()->json($clientes);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lotes =  DB::table('lote')->get();
        return view('reserva.create', compact('lotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $lotes = implode(',', $request->lotes);
            DB::statement("CALL insertar_reservas(?, ?)", array($request->cliente_id, $lotes));
              
            Reserva::UptadEstadoeLotes($request->lotes);
            // DB::select('CALL insertar_reserva(?, ?)', [$request->cliente_id, $lotes]);

            return  redirect()->to('reserva')->with('success','Reserva registrado correctamente');
        } catch (\Throwable $th) {
            return  redirect()->to('reserva/create')->with('error','Complete los Campos Vacios');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Reserva::deleteReserva($id);
        return redirect()->to('reserva')->with('success', 'Reserva anulada correctamente');
    }


    public function reservaVenta($id){
        $lote = new LoteController();
        $lote_reserva = $lote->ajaxReservaVenta($id);
        return view('venta.create',[
            'lote_reservas'=> json_encode($lote_reserva)
        ]);
    }
}
