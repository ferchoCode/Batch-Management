<?php

namespace App\Http\Controllers;

use App\Models\VentaServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaServicioController extends Controller
{

    public function index()
    {
        $ventaservicio= VentaServicio::getVentaServicio();
        return view('venta-servicio.index', ['ventaservicio' => $ventaservicio]);
    }

 
    public function create()
    {
        $servicio =  DB::table('servicio')->get();
        return view('venta-servicio.create', ['servicio' => $servicio]);
        
    }


    public function store(Request $request)
    {
        try {
            
            VentaServicio::saveVentaServicio($request);
            
            return redirect()->to('paquete')->with('success','credito asignado correctamente');
        }catch (\Exception $e){
            return redirect()->to('paquete')->with('error',$e->getMessage());
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

  
}
