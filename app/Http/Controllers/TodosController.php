<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Controllers\Controller;

use \App\Models\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //utilizo la clase todo de eloquent
        $todos = Todo::all();
        //le paso a la vista el resultado que arroja eloquent
        return view('todos.index',compact('todos'));
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
    public function store(StoreTodoRequest $request) //Cambiamos a que request sea del request que creamos
    {
        //Validamos el request antes de seguir con el proceso
        // $this->validate($request, [
        //     'name' => 'required|unique:todos'
        // ]);

        //Guardamos el elemento utilizando todo el request
        //no me preocupo por cosas que no me interesan porque ya
        //tengo fillable en el modelo
        Todo::create($request->all());

        //Regreso a la vista de la que venia
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //Cargamos la información de comentarios para que este dentro del objeto todo
        $todo->load(['comments'=>function($query){
          $query->orderBy('created_at','desc');
        }]);

        return view('todos.single')->with('todo',$todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());

        return redirect('todos');
    }

    /**
     * Cambia el estatus del todo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggl(Todo $todo)
    {
        if($todo->status)
          $todo->status = false;
        else {
          $todo->status = true;
        }

        $todo->save();

        session()->flash('flash_message','El ToDo ha cambiado de estatus satisfactoriamente');
        session()->flash('flash_message_type','success');

        return redirect('todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('todos');
    }
}
