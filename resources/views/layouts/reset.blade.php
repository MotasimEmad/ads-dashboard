<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alkhaaldi</title>

    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <link rel="stylesheet" href=
    "https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('public/alkhaaldi_logo.png') }}"/>
    @if(app()->getLocale() == 'en')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    @endif
</head>
<body class="bg-gray-200" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" style="{{ app()->getLocale() == 'ar' ? 'font-family: Cairo' : 'font-family: Ubuntu' }}">
    <div class="my-32">
        @yield('content')
    </div>
</body>
</html>
