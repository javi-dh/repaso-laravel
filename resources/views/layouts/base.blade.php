<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset("/css/app.css") }}">
  </head>
  <body>
    @include('layouts.header')

    <div class="container">
        @yield("content")
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
  </body>
</html>
