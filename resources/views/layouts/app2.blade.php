<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alkhaaldi</title>

    <link rel="stylesheet" href="{{  mix('css/app.css') }}">
    <!--<script src="{{ asset('public/js/app.js') }}" defer></script>-->
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
    
     <x-embed-styles />
</head>

<body class="bg-gray-200 min-h-screen" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" style="{{ app()->getLocale() == 'ar' ? 'font-family: Cairo' : 'font-family: Ubuntu' }}">
    <div id="app">
    
        <div class="flex flex-col md:flex-row">
    
           @include('layouts.sidebar')
    
            <div class="w-full md:flex-1">
                <nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-16">
                    <div class="links">
                        <div class="dropdown">
                            <button class="btn bg-gray-700 hover:bg-gray-600 text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('translation.btn')}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('switchLan','en') }}">{{ __('translation.english') }}</a>
                                <a class="dropdown-item" href="{{ route('switchLan','ar') }}"> {{ __('translation.arabic') }}</a>
                            </div>
                        </div>
                    </div>  
                    <div class="flex items-center font-semibold">
                        {{ Auth::user()->name }}
                        <a class="mx-2 text-gray-700 focus:outline-none" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg class="h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                        </a>
                    </div>
                </nav>
                <main>
                    <!-- Replace with your content -->
                    <div class="px-8 py-6 font-Quicksand">
                        @yield('content')
                    </div>
                    <!-- /End replace -->
                </main>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    
    
    </div>
    
    <script>
        $('input#tel_input').on('input propertychange paste', function(e) {
            var val = $(this).val()
            var reg = /^0/gi;
            if (val.match(reg)) {
                $(this).val(val.replace(reg, ''));
            }
        });
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script
    src=
    "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
    @yield('scripts')
    
    </body>
</html>
