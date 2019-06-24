<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('preguntas/crear/{id}', 'PreguntaController@crear')->name('preguntas.crear');
Route::get('encuestas/responder/{id}', 'EncuestaController@responder')->name('encuestas.responder');

Route::post('encuestas/resultados', 'EncuestaController@resultados')->name('encuestas.resultados');

//existe una entidad/recurso Encuesta que es atendida por un controlador concreto (EncuestaController)
Route::resource('medicos', 'MedicoController'); //solamente accesibles por aquellos usuarios autenticados
Route::resource('encuestas', 'EncuestaController');
Route::resource('ambitos', 'AmbitoController'); //
Route::resource('preguntas', 'PreguntaController');
Route::resource('respuestas', 'RespuestaController');
Route::resource('valoracions', 'ValoracionController');


Route::resource('pacientes', 'PacienteController'); //**


Route::get('/home', 'HomeController@index')->name('home');

