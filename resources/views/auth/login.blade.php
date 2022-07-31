@extends('layouts.auth')

@section('content')
    @if (Session::has('success'))
        <div class="px-28 pt-24">
            <div class=" bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700 font-semibold" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}" role="alert">
                {{ __('translation.wait_admin') }}
            </div>
        </div>
    @endif
    <div class="min-h-screen flex items-center px-4 md:px-0">
        <div class="bg-white w-full max-w-lg rounded-lg shadow overflow-hidden mx-auto">
            <div class="py-4 px-6">
                <div class="text-center font-bold text-gray-700 text-3xl">Alkhaaldi</div>
                <div class="mt-1 text-center font-bold text-gray-600 text-xl">{{ __('translation.welcome_back') }}</div>
                <div class="mt-1 text-center text-gray-600">{{ __('translation.login') }}</div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mt-4 w-full">
                        <input type="email" name="email" placeholder="{{ __('translation.email') }}"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        @error('email')
                        <p class="text-red-500 text-xs mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mt-4 w-full">
                        <input type="password" name="password" placeholder="{{ __('translation.password') }}"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('password.request') }}" class="text-gray-600 text-sm hover:text-gray-500">{{ __('translation.forget_password') }}</a>
                        <button type="submit"
                                class="py-2 px-4 bg-gray-700 text-white rounded hover:bg-gray-600 focus:outline-none">
                            {{ __('translation.login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
