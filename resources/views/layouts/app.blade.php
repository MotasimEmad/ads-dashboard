<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alkhaaldi</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--<script src="{{ asset('public/js/app.js') }}" defer></script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <link rel="stylesheet" href=
    "https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
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
@foreach (Auth::user()->projects as $project) 
    @if($project->state == '0')
        <body class="bg-gray-200 min-h-screen py-20"  dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" style="{{ app()->getLocale() == 'ar' ? 'font-family: Cairo' : 'font-family: Ubuntu' }}">
            <style>
                .emoji-404{
                    position: relative;
                    animation: mymove 2.5s infinite;
                }
    
                @keyframes mymove {
                    33%   {top: 0px;}
                    66%  {top: 20px;}
                    100%  {top: 0px}
                }
            </style>
            <div class="justify-center">
                <center class="mt-24 m-auto">
                    <svg class="emoji-404 " enable-background="new 0 0 226 249.135" height="249.135" id="Layer_1" overflow="visible" version="1.1" viewBox="0 0 226 249.135" width="226" xml:space="preserve" ><circle cx="113" cy="113" fill="#FFE585" r="109"/><line enable-background="new    " fill="none" opacity="0.29" stroke="#6E6E96" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="88.866" x2="136.866" y1="245.135" y2="245.135"/><line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="154.732" x2="168.732" y1="245.135" y2="245.135"/><line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="69.732" x2="58.732" y1="245.135" y2="245.135"/><circle cx="68.732" cy="93" fill="#6E6E96" r="9"/><path d="M115.568,5.947c-1.026,0-2.049,0.017-3.069,0.045  c54.425,1.551,98.069,46.155,98.069,100.955c0,55.781-45.219,101-101,101c-55.781,0-101-45.219-101-101  c0-8.786,1.124-17.309,3.232-25.436c-3.393,10.536-5.232,21.771-5.232,33.436c0,60.199,48.801,109,109,109s109-48.801,109-109  S175.768,5.947,115.568,5.947z" enable-background="new    " fill="#FF9900" opacity="0.24"/><circle cx="156.398" cy="93" fill="#6E6E96" r="9"/><ellipse cx="67.732" cy="140.894" enable-background="new    " fill="#FF0000" opacity="0.18" rx="17.372" ry="8.106"/><ellipse cx="154.88" cy="140.894" enable-background="new    " fill="#FF0000" opacity="0.18" rx="17.371" ry="8.106"/><path d="M13,118.5C13,61.338,59.338,15,116.5,15c55.922,0,101.477,44.353,103.427,99.797  c0.044-1.261,0.073-2.525,0.073-3.797C220,50.802,171.199,2,111,2S2,50.802,2,111c0,50.111,33.818,92.318,79.876,105.06  C41.743,201.814,13,163.518,13,118.5z" fill="#FFEFB5"/><circle cx="113" cy="113" fill="none" r="109" stroke="#6E6E96" stroke-width="8"/></svg>
                    <div class=" tracking-widest mt-4">
                        <span class="text-gray-500 text-xl block"><span>{{__('translation.sorry') }}</span></span>
                        <span class="text-gray-500 text-xl">{{__('translation.just_wait') }}</span>
                    </div>
                </center>
                <center class="mt-6">
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="hover:no-underline text-gray-500 font-mono text-xl bg-gray-200 p-3 rounded-md hover:shadow-md">{{__('translation.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </center>
            </div>
        </body> 
    @else
    <body class="bg-gray-200 min-h-screen" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" style="{{ app()->getLocale() == 'ar' ? 'font-family: Cairo' : 'font-family: Ubuntu' }}">
    <div id="app">
    
         <div class="flex flex-col md:flex-row">
    
          
    
           @include('layouts.sale_sidebar')
    
            <div class="w-full md:flex-1">
                <nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-16">
                    <div class="links flex items-cente" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start' }}">
                        <div class="dropdown">
                             <button class="transition duration-300 ease-in-out transform hover:-translate-y-1 flex items-center px-4 bg-gray-700 hover:bg-gray-600 text-white dropdown-toggle rounded-md py-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="mx-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                <div class="mx-2">{{__('translation.btn')}}</div>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('switchLan','en') }}"> {{ __('translation.english') }}</a>
                                <a class="dropdown-item" href="{{ route('switchLan','ar') }}"> {{ __('translation.arabic') }}</a>
                            </div>
                        </div>
                        <a href="http://www.cssix.com/{{ $project->name}}" class="mx-2 btn bg-gray-700 hover:bg-gray-600 text-white transition duration-300 ease-in-out transform hover:-translate-y-1">
                           {{__('translation.visit_website')}}
                        </a>
                        <button onclick="myFunction()" class="btn bg-gray-700 hover:bg-gray-600 text-white transition duration-500 ease-in-out transform hover:-translate-y-1">
                            {{__('translation.copy_url')}}
                        </button>
                        <input disabled id="myInput" value="https://www.cssix.com/{{ $project->name }}" class="mx-2 btn text-sm font-semibold text-center text-gray-800 transition-colors duration-200 transform bg-transparent border border-gray-800 rounded-md w-96" />
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
                    <div class="px-4 md:px-8 py-6">
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
        function myFunction() {
          var copyText = document.getElementById("myInput");
          copyText.select();
          copyText.setSelectionRange(0, 99999); /* For mobile devices */
          navigator.clipboard.writeText(copyText.value);
        }
    </script>
    
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
    @endif
    @endforeach
</html>
