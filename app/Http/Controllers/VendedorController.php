<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
   
    public function index()
    {
        $vendedor=Vendedor::all();
        return view('vendedor.index',['vendedor'=>$vendedor]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $vendedor = new Vendedor($request->input());
        $vendedor->save();
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
        $propietario = Vendedor::findOrFail($id);
        $propietario->delete();
        return redirect()->back()->with('error','Vendedor Eliminado correctamente');
    }
}
