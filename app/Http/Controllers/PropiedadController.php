<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropiedadController extends Controller
{
  
    public function index()
    {

        $vendedor =  DB::table('vendedor')->get();
        $propietario =  DB::table('propietario')->get();
        // $propiedad = Propiedad::all();
        $propiedad = Propiedad::getPropiedad();
        // dd($propiedad);
        return view('propiedad.index',['vendedor'=>$vendedor, 'propietario'=>$propietario,'propiedad'=>$propiedad]);
  
        // return view('propiedad.index',compact('vendedor','propietario'));
    }

  
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

    //    dd($request);
        $propiedad = new Propiedad();
        $propiedad->propietario_id=$request->propietario;
        $propiedad->vendedor_id=$request->vendedor;
        $propiedad->cod=$request->cod;
        $propiedad->nombre=$request->nombre;
        $propiedad->direccion=$request->direccion;
        
        if($request->hasFile('featured'))
        {
            $file = $request->file('featured');
            $destinoPath='img/featureds/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($destinoPath,$filename);
            $propiedad->fotografia=$destinoPath . $filename;
        }
        $propiedad->precio=$request->precio;
        $propiedad->estado = 'D';
        $propiedad->save();


        return redirect()->back();


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
      $propiedad = Propiedad::findOrFail($id);
      $propiedad->delete();
      return redirect()->to('propiedad')->with('error','Cliente Eliminado correctamente');
    }
}
