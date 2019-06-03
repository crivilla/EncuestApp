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

    public function index()
    {
        $encuestas = Encuesta::all();
        return view('encuestas/index',['encuestas'=>$encuestas]);
    }

    public function create()
    {
        //Listar todos los ambitos que existen para que un usuario pueda elegir
        $ambitos = Ambito::all()->pluck('name','id'); //array que asocia id con ambito
        return view('encuestas/create', ['ambitos'=>$ambitos]); //manda array a la vista

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'fechainicio' => 'required|date|after:now',
            'fechafinal' => 'required|date|after:now',
            'ambito_id' => 'required|exists:ambitos,id'
        ]);

        $encuesta = new Encuesta($request->all());
        $encuesta->save();

        flash('Encuesta creada correctamente');
        return redirect()->route('encuestas.index');

    }

    public function show(Encuesta $encuesta)
    {
        //
    }

    public function edit($id)
    {
        $encuesta = Encuesta::find($id);
        $ambitos = Ambito::all()->pluck('name','id');
        return view('encuestas/edit',['encuesta'=> $encuesta, 'ambitos'=>$ambitos ]);
    }

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

    public function destroy($id)
    {
        $encuesta = Encuesta::find($id);
        $encuesta->delete();
        flash('Encuesta borrada correctamente');
        return redirect()->route('encuestas.index');
    }
}
