<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    //
    public function index()
    {
        //$personas=Persona::all();
        $personas = Persona::included()->get();
        //$personas=Persona::included()->filter();
        //$personas=Persona::included()->filter()->sort()->get();
        //$personas=Persona::included()->filter()->sort()->getOrPaginate();
        return response()->json($personas);
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
            'name'=>'required|max:100',
            'email'=>'required|max:100',

        ]);

        $persona = Persona::create($request->all());

        return response()->json($persona);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($id) //si se pasa $id se utiliza la comentada
    {  
        $persona = Persona::included()->findOrFail($id);
        return response()->json($persona);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|max:100',
            

        ]);

        $persona->update($request->all());

        return response()->json($persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return response()->json($persona);
    }
}
