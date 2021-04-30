<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  {{--<!-- CSRF Token -->--}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @stack('meta')

  <title>{{ config('app.name', 'Laravel') }}</title>


  {{--<!-- Scripts -->--}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('js')

  {{--<!-- Fonts -->--}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  {{--<!-- Styles -->--}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />

  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @stack('css')

</head>

<body class="@yield('body-class')">
@yield('body')
@stack('last-js')
</body>
</html>
