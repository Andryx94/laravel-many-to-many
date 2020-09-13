<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Parco auto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,600,400,800" rel="stylesheet">
  </head>
  <body>
    <header>
      @include('partials.header')
    </header>

    <main>
      @yield('section')
    </main>

    <footer>
      @include('partials.footer')
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
