<?php

namespace App\Http\Controllers;

use App\Encuesta;
use Illuminate\Http\Request;
use App\Ambito;

class EncuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas = Encuesta::all();
        return view('encuestas/index',['encuestas'=>$encuestas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Listar todos los ambitos que existen para que un usuario pueda elegir
        $ambitos = Ambito::all()->pluck('name','id'); //array que asocia id con ambito
        return view('encuestas/create', ['ambitos'=>$ambitos]); //manda array a la vista

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //siempre que los usuarios introduzcan datos ->validate

        $this->validate($request, [
            'titulo' => 'required|max:255',
            'fechainicio' => 'required|date|after:now', //?????? fecha
            'fechafinal' => 'required|date|after:now',
            'ambito_id' => 'required|exists:ambitos,id'
        ]);

        $encuesta = new Encuesta($request->all());
        $encuesta->save();

        // return redirect('ambitos');

        flash('Encuesta creada correctamente');

        return redirect()->route('encuestas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Encuesta $encuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encuesta = Encuesta::find($id);
        $ambitos = Ambito::all()->pluck('name','id');
        return view('encuestas/edit',['encuesta'=> $encuesta, 'ambitos'=>$ambitos ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'fechainicio' => 'required|date',
            'fechafinal' => 'required|date',
            'ambito_id' => 'required|exists:ambitos,id'
        ]);

        $encuesta = Encuesta::find($id);
        $encuesta-> fill($request->all());

        $encuesta->save();

        flash('Encuesta modificada correctamente');

        return redirect()->route('encuestas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encuesta = Encuesta::find($id);
        $encuesta->delete();
        flash('Encuesta borrada correctamente');
        return redirect()->route('encuestas.index');
    }
}
