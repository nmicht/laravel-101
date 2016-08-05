<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ToDo site</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          @yield('contenido')
        </div>
      </div>

      <footer class="row">
        @yield('footer')
        <p>
          Material generado para el Taller de Laravel 2016
        </p>
        <p>Copyright &copy; 2016 <a href="http://twitter.com/nmicht">@nmicht</a></p>
      </footer>
    </div>

    <!-- scripts section -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    @yield('scripts')
  </body>
</html>
