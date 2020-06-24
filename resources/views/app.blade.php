<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <title>Hello, world!</title>
</head>
<body>
<header></header>
<main>
    @yield('content')
</main>
<footer></footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{!! asset('js/app.js') !!}"></script>
</body>
</html>
