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
    <h1>Lista de Proyectos</h1>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    @foreach ($projects as $project)
    <div class="panel panel-default">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$project->id}}" aria-expanded="true" aria-controls="collapseOne">
            <div class="panel-heading" role="tab" id="heading{{$project->id}}">
                <h4 class="panel-title" style="display: inline">
                    {{$project->name}}
                </h4>
                <span class="pull-right">
                    {{$project->manager->name}}
                </span>
            </div>
        </a>
        <div id="collapse{{$project->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$project->id}}">
          <div class="panel-body">
            <ul>
                @foreach ($project->todos as $todo)
                <li>{{$todo->name}} <span class="label label-info">{{$todo->pivot->tag}}</span></li>
                @endforeach
            </ul>
          </div>
        </div>
    </div>
    @endforeach
  </div>
@stop
