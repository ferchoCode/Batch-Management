<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Servicio;
use App\Models\ServicioPaquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Carbon;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon as SupportCarbon;

class PaqueteController extends Controller
{

    public function index()
    {

        $paquete =  DB::table('paquete')->get();
    
        return view('paquete.index',['paquete'=>$paquete]);
    }

  
    public function create()
    {
        $servicio =  DB::table('servicio')->get();
        return view('paquete.create',['servicio'=>$servicio]);

    }

    public function store(Request $request)
    {

        try {
            $paquete = new Paquete();
            $paquete->nombre=$request->nombre;
            $paquete->descripcion=$request->descripcion;
            $paquete->precio=$request->precio;
            $paquete->estado = 'Activo';
            $paquete->fecha_fin=$request->fecha_fin;
            $paquete->fecha_inicio=$request->fecha_inicio;
            $paquete->save();
    
            if ($paquete->save()) {
                $id=$paquete->id; // Aca obtenés el identificador registrado en la tabla
            }
            ServicioPaquete::procServicoPaquete($request->arrayservicios, $id);
      

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
        $paquete = Paquete::findOrFail($id);
        $paquete->delete();
        return redirect()->to('paquete')->with('error','Paquete Eliminado correctamente');
    }
    public function mostrarservicios($id)
    {
       $serviciopaquete= ServicioPaquete::getServicoPaquete($id);

       return view('servicio-paquete.index',['serviciopaquete'=>json_decode($serviciopaquete)]);

    }

    
}
