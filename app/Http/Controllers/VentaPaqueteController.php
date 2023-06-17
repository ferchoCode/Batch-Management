<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\VentaPaquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class VentaPaqueteController extends Controller
{

    public function index()
    {

        $ventapaquete= VentaPaquete::getVentaPaquete();
        return view('venta-paquete.index', ['ventapaquete' => json_decode($ventapaquete) ]);
    }



    public function create(Request $request)
    {
        $paqueteajax = [];

        $socio =  DB::table('socio')->get();
        $paquete =  DB::table('paquete')->get();
        return view('venta-paquete.create', ['socio' => $socio, 'paquete' => $paquete, 'paqueteajax' => $paqueteajax]);
    }


    public function store(Request $request)
    {
        try {
            $ventapaquete = new VentaPaquete();
            $ventapaquete->socio_id=$request->socio_id;
            $ventapaquete->paquete_id=$request->paquete_id;
            $ventapaquete->fecha=$request->fecha;
            $ventapaquete->monto=$request->monto;
            $ventapaquete->save();
    
        
            return redirect()->to('ventapaquete')->with('success','credito asignado correctamente');
        }catch (\Exception $e){
            return redirect()->to('ventapaquete')->with('error',$e->getMessage());
        }

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
        //
    }

    public function getpaquete(Request $request)
    {
        if ($request->ajax()) {
            
            $paqueteajax = Paquete::getPaqueteAjax($request->id);


            $view = view('venta-paquete.tabla-paquete', ['paqueteajax' => $paqueteajax])->render();

            return response()->json(['codigo' => 0, 'mensaje' => 'Consulta realizada correctamente.', 'view' => $view, 'paqueteajax'=>$paqueteajax]);
        }
    }

    public function pdfgenerate($id)
    {
        $serviciopaquete= VentaPaquete::getServicoPaquete($id);
        // return view('venta-paquete.pdf-invoice');

        $pdf = \PDF::loadView('venta-paquete.pdf-invoice',compact('serviciopaquete'));
        return $pdf->stream();
    }
}
