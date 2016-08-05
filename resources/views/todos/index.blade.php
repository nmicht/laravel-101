@extends('todos.layout')

@section('contenido')
  <div class="row">
  <div class="col-md-5 col-md-offset-3">
  <h1>Lista de todos</h1>
    @foreach ($todos as $todo)
      <div class="">
        <input type="checkbox" name="status-{{$todo->id}}" value="">
        <a href="todos/{{$todo->id}}">{{$todo->name}}</a>
        <span class="label">{{$todo->color}}</span>
        <i class="glyphicon glyphicon-trash"></i>
      </div>
    @endforeach
  </div>
  </div>
  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      <form class="" action="todos" method="post">
        <div class="form-group">
          <label for="name">ToDo</label>
          <input type="text" name="name" value="" class="form-control">
        </div>
        <div id="cp2" class="input-group colorpicker-component">
            <input type="text" value="#00AABB" name="color" class="form-control" />
            <span class="input-group-addon"><i></i></span>
        </div>
        <button type="submit" class="btn">Crear</button>

      </form>
    </div>
  </div>
@stop

@section('scripts')
  <script>
      $(function() {
          $('#cp2').colorpicker();
      });
  </script>
@stop
