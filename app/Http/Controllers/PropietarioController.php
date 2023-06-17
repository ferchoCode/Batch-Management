<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropietarioController extends Controller
{
    
    public function index()
    {
        $propietario=Propietario::all();
        return view('propietario.index',['propietario'=>$propietario]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $propietario= new Propietario($request->input());
        $propietario->save();

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
 
        $propietario = Propietario::findOrFail($id);
        $propietario->delete();
        return redirect()->to('propietario')->with('error','Propietario Eliminado correctamente');
    }
}
