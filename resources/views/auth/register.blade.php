@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex items-center px-4 md:px-0">
        <div class="bg-white w-full max-w-lg rounded-lg shadow overflow-hidden mx-auto">
            <div class="py-4 px-6">
                <div class="text-center font-bold text-gray-700 text-3xl">Brand</div>
                <div class="mt-1 text-center font-bold text-gray-600 text-xl">Welcome back</div>
                <div class="mt-1 text-center text-gray-600">{{ __('translation.register') }}</div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mt-4 w-full">
                        <input type="text" name="name" placeholder="{{ __('translation.name') }}"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mt-4 w-full">
                        <input type="email" name="email" placeholder="{{ __('translation.email') }}"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
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
                    <div class="mt-4 w-full">
                        <input type="password" name="password_confirmation" placeholder="{{ __('translation.confirm_password') }}"
                               class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                    </div>
                    <input type="hidden" name="role" value="Sale">
                    <div class="flex justify-between items-center mt-6">
                        <button type="submit"
                                class="py-2 px-4 bg-gray-700 text-white rounded hover:bg-gray-600 focus:outline-none">
                            {{ __('translation.register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
