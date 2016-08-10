@extends('todos.layout')

@section('contenido')
  <h1><span class="{{ $todo->status ? 'completado' : '' }}">{{$todo->name}}</span> <span class="label" style="background-color: {{$todo->color}}">{{$todo->color}}</span> </h1>

  <p>
    Creado el {{$todo->created_at}}<br>
    Última edición el {{$todo->updated_at}}
  </p>

  <form action="/todos/{{$todo->id}}" method="post">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ method_field('PUT') }}

    <div class="form-group">
      <label for="name">ToDo</label>
      <input type="text" name="name" value="{{$todo->name}}" class="form-control">
    </div>

    <div class="form-group">
      <label for="color">Color</label>
      <div id="cp2" class="input-group colorpicker-component">
          <input type="text" value="{{$todo->color}}" name="color" class="form-control" />
          <span class="input-group-addon"><i></i></span>
      </div>
    </div>

    <label for="status">Estatus</label>
    <div class="radio">
      <label>
        <input type="radio" name="status" value="0" {{ $todo->status ? '' : 'checked' }}>
        Pendiente
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="status" value="1" {{ $todo->status ? 'checked' : '' }}>
        Completado
      </label>
    </div>

    <button type="submit" class="pull-right btn btn-default"><i class="glyphicon glyphicon-floppy-disk"></i> Editar</button>

  </form>

  <div>
    <a class="btn btn-default" href="/todos"><i class="glyphicon glyphicon-chevron-left"></i> Regresar</a>

    <form class="pull-right" action="/todos/{{$todo->id}}" method="post" style="display: inline; margin: 0 1em;">
      {{ method_field('DELETE') }}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
    </form>
  </div>

@stop

@section('scripts')
  <script>
      $(function() {
          $('#cp2').colorpicker();
      });
  </script>
@stop
