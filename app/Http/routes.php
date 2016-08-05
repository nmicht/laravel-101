<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Agregando otra ruta
Route::get('otro', function () {
  return 'Otra vista';
});

//Agregando otra ruta que manda a llamar un controlador y su método
Route::get('con-ruta', 'MiControlador@index');

//Agregando una ruta para una lista
Route::get('lista', 'FrutasControlador@index');

//Ruta con parámetros
Route::get('test/{param}', function ($param) {
  return $param;
})->where('param','[0-9]+'); //Valido para aceptar solo digitos

//------------------- TODOS -----------------------

//Binding de ruta con modelo
Route::model('todo','\App\Models\Todo');

//Ruta para lista los todos
Route::get('todos', 'TodosController@index');

//Ruta para mostrar un todo
Route::get('todos/{todo}', 'TodosController@show');

//Ruta para mostrar la vista de edición de un todo
Route::get('todos/{todo}/edit', 'TodosController@edit');

//Ruta para guardar un todo
Route::post('todos','TodosController@store');

//Ruta para editar un todo
Route::put('todos/{todo}','TodosController@update');

//Ruta para eliminar un todo
Route::delete('todos/{todo}','TodosController@destroy');

//Ruta para cambiar el estatus de un todo
Route::patch('todos/{todo}','TodosController@toggl');
