<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Illuminate\Http\Request;
use App\Encuesta;
use Illuminate\Support\Facades\Input;

class PreguntaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas/index',['preguntas'=>$preguntas]);
    }

    public function crear($id)    {

        return view('preguntas/create', ['id'=> $id]); //manda array a la vista**/
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'enunciado' => 'required|max:255',
            'tipo' => 'required|max:255'
        ]);

        $pregunta = new Pregunta($request->all());
        $pregunta->save();

        flash('Pregunta creada correctamente');

        return redirect()->route('encuestas.edit', ["id" => $pregunta->encuesta_id]);
    }

    public function show(Pregunta $pregunta)
    {

    }

    public function edit($id)
    {
        $pregunta = Pregunta::find($id);

        return view('preguntas/edit',['pregunta'=> $pregunta]);
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

        return redirect()->route('encuestas.edit', ["id" => $pregunta->encuesta_id]);
    }

    public function destroy($id)
    {

        $pregunta = Pregunta::find($id);
        $encuesta_id = $pregunta->encuesta_id;
        $pregunta->delete();
        flash('Pregunta borrada correctamente');
        return redirect()->route('encuestas.edit', ["id" => $encuesta_id]);
    }
}
