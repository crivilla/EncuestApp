<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Illuminate\Http\Request;
use App\Encuesta;

class PreguntaController extends Controller
{

    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas/index',['preguntas'=>$preguntas]);
    }

    public function create()
    {
        //Listar todos los tipos de preguntas que existen para que el usuario pueda elegir

        $encuestas = Encuesta::all()->pluck('titulo','id');
        return view('preguntas/create', ['encuestas'=>$encuestas]); //manda array a la vista**/
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'enunciado' => 'required|max:255',
            'tipo' => 'required|max:255',
            'encuesta_id' => 'required|exists:encuestas, id'
        ]);

        $pregunta = new Pregunta($request->all());
        $pregunta->save();

        flash('Pregunta creada correctamente');

        return redirect()->route('preguntas.index');
    }

    public function show(Pregunta $pregunta)
    {

    }

    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        $encuestas = Encuesta::all()->pluck('titulo','id', 'ambito_id', 'fechainicio', 'fechafinal');
        return view('preguntas/edit',['pregunta'=> $pregunta, 'encuestas'=>$encuestas ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'enunciado' => 'required|max:255',
            'tipo' => 'required|max:255',
            'encuesta_id' => 'required|exists:encuestas,id'
        ]);

        $pregunta = Pregunta::find($id);
        $pregunta-> fill($request->all());

        $pregunta->save();

        flash('Pregunta modificada correctamente');

        return redirect()->route('preguntas.index');
    }

    public function destroy($id)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->delete();
        flash('Pregunta borrada correctamente');
        return redirect()->route('preguntas.index');
    }
}
