@extends('todos.layout')

@section('contenido')
  <h1><span class="{{ $todo->status ? 'completado' : '' }}">{{$todo->name}}</span> <span class="label" style="background-color: {{$todo->color}}">{{$todo->color}}</span> </h1>

  <p>
    Creado el {{$todo->created_at}}<br>
    Última edición el {{$todo->updated_at}}
  </p>

  <a href="/todos/{{$todo->id}}/edit"><i class="glyphicon glyphicon-pencil"></i></a>

  <form action="{{$todo->id}}" method="post" style="display: inline">
    {{ method_field('DELETE') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="no-button glyphicon glyphicon-trash"></button>
  </form>

  <a class="btn btn-default" href="/todos"><i class="glyphicon glyphicon-chevron-left"></i> Regresar</a>
@stop
