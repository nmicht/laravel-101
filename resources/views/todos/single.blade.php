@extends('todos.layout')

@section('contenido')
  <h1><span class="{{ $todo->status ? 'completado' : '' }}">{{$todo->name}}</span> <span class="label" style="background-color: {{$todo->color}}">{{$todo->color}}</span> </h1>

  <p>
    Creado el {{$todo->created_at}}<br>
    Última edición el {{$todo->updated_at}}
  </p>

  <form class="row" action="/todos/{{$todo->id}}/comment" method="post">

      <div class="input-group">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="comment" placeholder="Escribe un comentario...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">OK</button>
        </span>
      </div>

  </form>

  <!-- comentarios -->
  @foreach ($todo->comments as $comment):
  <div class="media">
    <div class="media-left">
      <a href="#">
        <img class="media-object" src="https://api.adorable.io/avatars/50/abott@adorable.png" alt="...">
      </a>
    </div>
    <div class="media-body">
      <p>{{$comment->comment}}</p>
      <p>{{$comment->created_at}}</p>
    </div>
  </div>
  @endforeach

  <a href="/todos/{{$todo->id}}/edit"><i class="glyphicon glyphicon-pencil"></i></a>

  <form action="{{$todo->id}}" method="post" style="display: inline">
    {{ method_field('DELETE') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="no-button glyphicon glyphicon-trash"></button>
  </form>

  <a class="btn btn-default" href="/todos"><i class="glyphicon glyphicon-chevron-left"></i> Regresar</a>
@stop
