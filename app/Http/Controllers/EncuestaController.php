<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Pregunta;
use Illuminate\Http\Request;
use App\Ambito;

use App\Helper;
use App\Surveys;
use App\Questions;
use App\AnswersSessions;
use App\SurveysLastVersionsView;
use Webpatser\Uuid\Uuid;
use Jenssegers\Agent\Agent;

class EncuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function responder($id)
    {
        $encuesta = Encuesta::find($id);
        $preguntas = Pregunta::where('encuesta_id', $id)->get();
        return view('encuestas/responder', ['encuesta' => $encuesta, 'preguntas' => $preguntas]);
    }

    public function resultados(Request $request)
    {
        $encuesta_id = $request->get('encuesta_id');
        $encuesta = Encuesta::find($encuesta_id);
        $preguntas = Pregunta::where('encuesta_id', $encuesta_id)->get();
        foreach ($preguntas as $pregunta) {
            $pregunta->value = $request->get($pregunta->id);
        }
        return view('encuestas/resultados', ['preguntas' => $preguntas, 'encuesta' => $encuesta]);
    }

    public function index()
    {
        $encuestas = Encuesta::all();
        return view('encuestas/index', ['encuestas' => $encuestas]);
    }

    public function create()
    {
        //Listar todos los ambitos que existen para que un usuario pueda elegir
        $ambitos = Ambito::all()->pluck('name', 'id'); //array que asocia id con ambito
        return view('encuestas/create', ['ambitos' => $ambitos]); //manda array a la vista
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'fechainicio' => 'required|date|after:now',
            'fechafinal' => 'required|date|after:fechainicio',
            'ambito_id' => 'required|exists:ambitos,id'
        ]);

        $encuesta = new Encuesta($request->all());
        $encuesta->save();

        flash('Encuesta creada correctamente');
        return redirect()->route('encuestas.edit', ['id' => $encuesta->id]);
        // return redirect()->route('survey.edit', $survey->uuid);

    }

    public function show(Encuesta $encuesta)
    {
        $pregunta = Pregunta::where('encuesta_id', $encuesta->id);

    }

    public function edit($id)
    {
        $encuesta = Encuesta::find($id);
        $ambitos = Ambito::all()->pluck('name', 'id');
        $preguntas = Pregunta::where('encuesta_id', $id)->get();
        return view('encuestas/edit', ['encuesta' => $encuesta, 'ambitos' => $ambitos, 'preguntas' => $preguntas]);

    }

    public function update(Request $request, $id) /*($uuid, Request $request)*/
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'fechainicio' => 'required|date|after:now',
            'fechafinal' => 'required|date|after:fechainicio',
            'ambito_id' => 'required|exists:ambitos,id'
        ]);

        $encuesta = Encuesta::find($id);
        $encuesta->fill($request->all());

        $encuesta->save();

        flash('Encuesta modificada correctamente');

        return redirect()->route('encuestas.index');
    }

    public function destroy($id) /*($uuid, Request $request) */
    {
        $encuesta = Encuesta::find($id);
        $encuesta->delete();
        flash('Encuesta borrada correctamente');
        return redirect()->route('encuestas.index');

    }
}
