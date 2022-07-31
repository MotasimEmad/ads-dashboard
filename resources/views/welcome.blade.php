<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Alkhaaldi</title>
       <link rel="stylesheet" href="{{  mix('css/app.css') }}">
       <script src="{{ mix('js/app.js') }}" defer></script>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
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
        
          @foreach($metas as $meta)
              <div class="hidden">
                  {{ $meta->meta_code }}
              </div>
          @endforeach
    </head>

     <body class="h-full bg-gray-800" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" style="{{ app()->getLocale() == 'ar' ? 'font-family: Cairo' : 'font-family: Ubuntu' }}">
        <header class="bg-gray-800 border-t-2 border-blue-500">
            <nav class="px-6 py-4">
                <div class="lg:items-center lg:justify-between lg:flex">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center animate-pulse">
                            <a class="text-2xl font-bold text-white lg:text-3xl hover:text-gray-300">
                                <img src="{{ asset('public/alkhaaldi_logo.png') }}" class="h-12" />
                            </a>
                            <span class="mx-2 font-semibold text-white uppercase text-xl">Alkhaaldi</span>
                        </div>                        
                    </div>
                     <div class="links mt-2 md:mt-0">
                        <div class="dropdown">
                            <button class="btn bg-gray-700 hover:bg-gray-600 text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('translation.btn')}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('switchLan','en') }}"> {{ __('translation.english') }}</a>
                                <a class="dropdown-item" href="{{ route('switchLan','ar') }}"> {{ __('translation.arabic') }}</a>
                            </div>
                        </div>
                    </div>  
                </div>
            </nav>
        </header>

        <div class="lg:flex md:mt-40 mx-4" style="text-align: start">
            <div class="flex items-center justify-center w-full px-6 py-8 lg:h-[32rem] lg:w-1/2">
                <div class="max-w-xl">
                    <h2 class="text-2xl font-semibold text-white lg:text-3xl">{{__('translation.build_new_idea') }}</h2>
                        
                    <p class="mt-2 text-sm text-gray-400 lg:text-xl">
                        {{__('translation.main_text') }}
                    </p>

                    <div class="flex flex-col mt-6 space-y-3 lg:space-y-0 lg:flex-row">
                        <a href="{{ route('login') }}" class="block px-6 py-4 text-sm font-semibold text-center text-white transition-colors duration-200 transform bg-gray-900 rounded-md hover:bg-gray-700">
                            {{__('translation.login') }}
                        </a>
                        <a href="{{ route('register') }}" class="block px-6 py-4 text-sm font-semibold text-center text-white transition-colors duration-200 transform bg-transparent border border-white rounded-md lg:mx-4">
                            {{__('translation.register') }}
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="w-full h-96 lg:w-1/2 mb-4 md:mb-0">
                <div class="w-full h-full bg-cover" style="background-image: url(https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80)">
                    <div class="w-full h-full bg-black opacity-25"></div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script
        src=
        "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </body>    
</html>