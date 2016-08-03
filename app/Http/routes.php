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

//Agregando otra ruta
Route::get('con-ruta', function () {
  return view('vista-nueva');
});

//Agregando una ruta para una lista
Route::get('lista', function () {
  $lista = ['Platano', 'Pera', 'Manzana'];

  //Paso el valor a la vista como un array
  //return view('lista', compact('lista'));

  //Paso el valor a la vista con with mas elegante
  return view('lista')->withLista($lista);
});
