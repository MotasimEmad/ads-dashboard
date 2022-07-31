@extends('layouts.auth')
@section('content')

<div class="bg-gray-900" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <div>
                    <h2 class="text-4xl font-bold text-white">{{ __('translation.crate_beautiful') }}</h2>
                    
                    <p class="max-w-xl mt-3 text-gray-300 font-bold">{{ __('translation.create_wait') }}</p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-center text-white">Alkhaaldi</h2>
                    
                    <p class="mt-3 text-gray-300">Let's build something amazing</p>
                </div>

                <div class="mt-8">
                    @if (Session::has('success'))
                        <div class=" bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700 font-semibold" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}" role="alert">
                            {{ __('translation.wait_admin') }}
                        </div>
                    @endif
                    <form action="{{ route('new_project') }}" method="POST">
                        @csrf
                        <input type="text" name="name" id="name" placeholder="{{ __('translation.project_name') }}" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-400 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        <input type="hidden" name="state" value="0" />
                        <button type="submit" class="mt-4 w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            {{ __('translation.create') }}
                        </button>
                    </form>
                </div>
                <div class="mt-10">
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="text-white font-semibold px-4 py-2 bg-red-500 rounded-md">
                        {{ __('translation.logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection