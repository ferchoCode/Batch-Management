<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Venta;
use App\Models\VentaContado;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::getVentas();
        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venta.create');
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
            $venta = new Venta();
            $venta->cliente_id = $request->cliente_id;
            $venta->lote_id = $request->lote_id;
            $venta->monto = $request->monto;
            $venta->fecha_venta = $request->fecha;
            $venta->tipo_venta = $request->tipo_vent;
            $venta->save();

            if ($venta->save()) {
                $venta_id = $venta->id; // Aca obtenés el identificador registrado en la tabla
                $venta = new VentaContado();
                $venta->venta_id = $venta_id;
                $venta->descripcion = $request->descripcion;
                $venta->descuento = $request->descuento;
                $venta->save();
            }
            Venta::UptadaEstadoCliente($request->cliente_id);
            Venta::UptadEstadoeLotes($request->lote_id);
            Reserva::UptadeReserva($request->cliente_id);

            return redirect()->to('venta')->with('success', 'venta registrada correctamente');
        } catch (\Throwable $th) {
            dd($th);
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
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect()->to('venta')->with('success','Venta Eliminado correctamente');
    }
}
