<?php

namespace App\Http\Controllers;

use App\Respuesta;
use Illuminate\Http\Request;
use App\Pregunta;


class RespuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $respuestas = Respuesta::all();
        return view('respuestas/index',['respuestas'=>$respuestas]);
    }

    public function create()
    {
        //Listar todos los preguntas que existen para que un usuario pueda elegir
        $preguntas = Pregunta::all()->pluck('enunciado','id'); //array que asocia id con pregunta
        return view('respuestas/create', ['preguntas'=>$preguntas]); //manda array a la vista
    }

    public function store(Request $request)
    {
        $this->validate($request, [/*
            'valoracion' => 'required|max:255',
            'pregunta_id' => 'required|exists:preguntas,id'*/
        ]);

        $respuesta = new Respuesta($request->all());
        $respuesta->save();

        flash('Respuesta creada correctamente');
        return redirect()->route('respuestas.index');

    }

    public function show(Respuesta $respuesta)
    {
        //
    }

    public function edit($id)
    {
        $respuesta = Respuesta::find($id);
        $preguntas = Pregunta::all()->pluck('enunciado','id');
        return view('respuestas/edit',['respuesta'=> $respuesta, 'preguntas'=>$preguntas ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [/*
            'valoracion' => 'required|max:255',
            'pregunta_id' => 'required|exists:preguntas,id' */
        ]);

        $respuesta = Respuesta::find($id);
        $respuesta-> fill($request->all());

        $respuesta->save();

        flash('Respuesta modificada correctamente');

        return redirect()->route('respuestas.index');
    }

    public function destroy($id)
    {
        $respuesta = Respuesta::find($id);
        $respuesta->delete();
        flash('Respuesta borrada correctamente');
        return redirect()->route('respuestas.index');
    }
}
