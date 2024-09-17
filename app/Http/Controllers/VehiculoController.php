<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    //
    public function index()
    {
        //$vehiculos=Vehiculo::all();
        $vehiculos = Vehiculo::included()->get();
        //$vehiculos=Vehiculo::included()->filter();
        //$vehiculos=Vehiculo::included()->filter()->sort()->get();
        //$vehiculos=Vehiculo::included()->filter()->sort()->getOrPaginate();
        return response()->json($vehiculos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'Marca'=>'required|max:100',
            'Modelo'=>'required|max:100',

        ]);

        $vehiculo = Vehiculo::create($request->all());

        return response()->json($vehiculo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($id) //si se pasa $id se utiliza la comentada
    {  
        $vehiculo = Vehiculo::included()->findOrFail($id);
        return response()->json($vehiculo);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'Marca'=>'required|max:100',
            'Modelo'=>'required|max:100',

        ]);

        $vehiculo->update($request->all());

        return response()->json($vehiculo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return response()->json($vehiculo);
    }
}
