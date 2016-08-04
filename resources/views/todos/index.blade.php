<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Mis ToDos</h1>
    @foreach ($data as $todo)
      <div class="">
        <input type="checkbox" name="status-{{$todo->id}}" value="">
        {{$todo->name}}
      </div>
    @endforeach
  </body>
</html>
