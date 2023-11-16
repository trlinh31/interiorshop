<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('fonts/fontawesome-free-6.4.2-web/css/all.min.css') }}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <title>Laravel Ecommerce</title>
</head>
<body>
  @include("includes.header")
  @yield("body")
  @include("includes.messages")
  @include("sweetalert::alert")
  @include("includes.footer")
  <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>