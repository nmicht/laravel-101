<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ToDo site</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>

    @yield('contenido')

    <footer>
      @yield('footer')
      Copyright Michelle 2016
    </footer>
  </body>
</html>
