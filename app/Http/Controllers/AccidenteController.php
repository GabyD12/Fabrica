<?php

namespace App\Http\Controllers;

use App\Models\Accidente;
use Illuminate\Http\Request;

class AccidenteController extends Controller
{
    //
    public function index()
    {
       // $accidentes=Accidente::all();
        $accidentes = Accidente::included()->get();
        //$accidentes=Accidente::included()->filter();
        //$accidentes=Accidente::included()->filter()->sort()->get();
        //$accidentes=Accidente::included()->filter()->sort()->getOrPaginate();
        return response()->json($accidentes);
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
            'Fecha'=>'required|max:100',
            'Hora'=>'required|max:100',
            'Lugar'=>'required|max:100',

        ]);

        $accidente = Accidente::create($request->all());

        return response()->json($accidente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accidente  $accidente
     * @return \Illuminate\Http\Response
     */
    public function show($id) //si se pasa $id se utiliza la comentada
    {  
        $accidente = Accidente::included()->findOrFail($id);
        return response()->json($accidente);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accidente  $accidente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accidente $accidente)
    {
        $request->validate([
            'Fecha'=>'required|max:100',
            'Hora'=>'required|max:100',
            'Lugar'=>'required|max:100',

        ]);

        $accidente->update($request->all());

        return response()->json($accidente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accidente  $accidente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accidente $accidente)
    {
        $accidente->delete();
        return response()->json($accidente);
    }
}
