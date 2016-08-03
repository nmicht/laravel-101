<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Lista de frutas</h1>
    <ul>
    @foreach ($lista as $elemento)
      <li>{{$elemento}}</li>
    @endforeach
    </ul>
  </body>
</html>
