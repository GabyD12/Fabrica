<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use Illuminate\Http\Request;

class MultaController extends Controller
{
    //
    public function index()
    {
        //$multas=Multa::all();
        $multas = Multa::included()->get();
        //$multas=Multa::included()->filter();
        //$multas=Multa::included()->filter()->sort()->get();
        //$multas=Multa::included()->filter()->sort()->getOrPaginate();
        return response()->json($multas);
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
            'Lugar'=>'required|max:100',
            'Fecha'=>'required|max:100',
            'Hora'=>'required|max:100',
            'Matricula'=>'required|max:100',

        ]);

        $multa = Multa::create($request->all());

        return response()->json($multa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Multa  $multa
     * @return \Illuminate\Http\Response
     */
    public function show($id) //si se pasa $id se utiliza la comentada
    {  
        $multa = Multa::included()->findOrFail($id);
        return response()->json($multa);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Multa $multa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multa $multa)
    {
        $request->validate([
            'Lugar'=>'required|max:100',
            'Fecha'=>'required|max:100',
            'Hora'=>'required|max:100',
            'Matricula'=>'required|max:100',
            

        ]);

        $multa->update($request->all());

        return response()->json($multa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Multa  $multa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Multa $multa)
    {
        $multa->delete();
        return response()->json($multa);
    }
}
