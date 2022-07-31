@extends('layouts.app')
@section('content')
     @if(Session::has('success'))
        <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">{{ __('translation.success') }} !</span> {{ __('translation.saved_success') }}
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="flex bg-red-300 rounded-lg p-4 mb-4 text-sm text-red-900" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
               <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                           {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @foreach ($socials as $social)
    <div class="w-full bg-gray-200"  style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
        <div class="h-96"></div>
        <div class="w-full lg:px-8 mb-12">
            <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-96 flex flex-col">
                <form method="POST" action="{{ route('socials.update', $social->id ) }}">
                    @method('PATCH')
                    @csrf
                    <div class="mt-10">
                        <label class="font-semibold leading-none text-gray-800">{{ __('translation.facebook_link') }} <span class="text-gray-400 font-thin">({{ __('translation.optional') }})</span></label>
                        <input value="{{ $social->facebook_link }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="facebook_link" type="text" />
                    </div>

                    <div class="mt-10">
                        <label class="font-semibold leading-none text-gray-800">{{ __('translation.twitter_link') }} <span class="text-gray-400 font-thin">({{ __('translation.optional') }})</span></label>
                        <input value="{{ $social->twitter_link }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="twitter_link" type="text" />
                    </div>

                    <div class="mt-10">
                        <label class="font-semibold leading-none text-gray-800">{{ __('translation.instagram_link') }} <span class="text-gray-400 font-thin">({{ __('translation.optional') }})</span></label>
                        <input value="{{ $social->instagram_link }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="instagram_link" type="text" />
                    </div>

                    <div class="mt-10">
                        <label class="font-semibold leading-none text-gray-800">{{ __('translation.snapchat_link') }} <span class="text-gray-400 font-thin">({{ __('translation.optional') }})</span></label>
                        <input value="{{ $social->snapchat_link }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="snapchat_link" type="text" />
                    </div>                   

                    <div class="flex items-center justify-center w-full">
                        <button type="submit" class="mt-8 font-semibold leading-none text-white py-4 px-10 bg-gray-800 rounded hover:bg-gray-600 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700 focus:outline-none">
                            {{ __('translation.edit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection