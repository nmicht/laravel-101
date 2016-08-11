@extends('todos.layout')

@section('contenido')
@if (session()->has('flash_message'))
    <div class="alert alert-{{session()->get('flash_message_type')}} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session()->get('flash_message') }}
    </div>
@endif
  <div class="row">
    <h1>Lista de todos</h1>
    @foreach ($todos as $todo)
      <div>
        <form action="todos/{{$todo->id}}" method="post" style="display: inline">
          {{ method_field('PATCH') }}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="no-button glyphicon {{ $todo->status ? 'glyphicon-remove-sign' : 'glyphicon-ok-sign' }}"></button>
        </form>

        <a class="{{ $todo->status ? 'completado' : '' }}" href="todos/{{$todo->id}}">{{$todo->name}}</a>
        <span class="label" style="background-color: {{$todo->color}}">{{$todo->color}}</span>

        <form action="todos/{{$todo->id}}" method="post" style="display: inline">
          {{ method_field('DELETE') }}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="no-button glyphicon glyphicon-trash"></button>
        </form>
      </div>
    @endforeach
  </div>

  <div class="row">
    <h1>Crear ToDos</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="" action="todos" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">ToDo</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="color">Color</label>
        <div id="cp2" class="input-group colorpicker-component">
            <input type="text" value="{{ old('color') }}" name="color" class="form-control" />
            <span class="input-group-addon"><i></i></span>
        </div>
      </div>

      <fieldset>
        <legend>Proyecto</legend>
        @foreach ($projects as $key => $project)

        <!-- si el id del proyecto existe en el arreglo, entonces marco el check -->
        <input
           type="checkbox"
           name="project[]"
           value="{{$project->id}}"
           {{ in_array($project->id, old('project') ?: [] ) ? 'checked' : '' }}
        />

        {{$project->name}}<br>

        @endforeach
        <br>
      </fieldset>

      <div class="form-group">
        <label for="name">Etiqueta</label>
        <input type="text" name="tag" value="{{ old('tag') }}" class="form-control">
      </div>

      <button type="submit" class="pull-right btn btn-default"><i class="glyphicon glyphicon-floppy-disk"></i> Crear</button>

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
