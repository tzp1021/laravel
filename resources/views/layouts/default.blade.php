<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Whisper')</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @yield ('header')

    <div class="container">
      <div class="col-md-offset-1 col-md-10">
        @include ('shared._messages')
        @yield ('content')
      </div>
    </div>
  </body>
</html>
