<?php

namespace App\Http\Controllers;

use App\Ambito;
use Illuminate\Http\Request;

class AmbitoController extends Controller
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
        //
        $ambitos = Ambito::all();
        return view('ambitos/index',['ambitos'=>$ambitos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ambitos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255']);
        $ambito = new Ambito($request->all());
        $ambito->save();

        flash('Ámbito creado correctamente');
        return redirect()->route('ambitos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ambito  $ambito
     * @return \Illuminate\Http\Response
     */
    public function show(Ambito $ambito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ambito  $ambito
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ambito = Ambito::find($id);
        return view('ambitos/edit',['ambito'=> $ambito ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ambito  $ambito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $ambito = Ambito::find($id);
        $ambito->fill($request->all());

        $ambito->save();

        flash('Ámbito modificado correctamente');

        return redirect()->route('ambitos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ambito  $ambito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambito = Ambito::find($id);
        $ambito->delete();
        flash('Ámbito borrado correctamente');

        return redirect()->route('ambitos.index');
    }
}
