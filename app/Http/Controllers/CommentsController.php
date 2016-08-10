<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Todo $todo)
    {
        $data = $request->all();

        //Obtener el id del todo de la url que esta en todos/id/comment
        //$data['todo_id'] = $request->segment(2);

        //Para evitar el paso anterior podemos inyectar el todo directo
        //arriba en los parametros inyectamos el todo y laravel automáticamente
        //lo toma
        $data['todo_id'] = $todo->id;

        //Guardamos el elemento utilizando $data que ya tiene todo el request
        //y además le agregue el id desde la url
        Comment::create($data);

        //Regreso a la vista de la que venia
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        $comment->delete();

        return back();
    }
}
