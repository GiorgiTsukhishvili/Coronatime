<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/js/app.js')
    <title>Coronatime</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('imgs/corona-favicon.png') }}">

    @vite('resources/css/app.css')


</head>

<body>

    {{ $content }}

</body>

</html>
