@extends('layouts.app')
@section('content')'@if(Session::has('success'))
       <div class="flex bg-green-300 rounded-lg p-4 mb-4 text-sm text-green-900" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">{{ __('translation.success') }} !</span> {{ __('translation.saved_success') }}
            </div>
        </div>
    @endif
   @if ($errors->any())
        <div class="py-3 px-5 mb-4 bg-red-300 text-red-900 text-xl rounded-md border border-red-200 {{ app()->getLocale() == 'en' ? '' : 'text-right'}}" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($metas as $meta)
        <div class="w-full bg-gray-200 h-screen" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
            <div class="h-96"></div>
            <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
                <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
                    <form action="/sale/meta/{{ $meta->id }}" method="POST">
                       @csrf
                       @method('PATCH')
                       <div>
                            <div class="flex items-center">
                                <label class="font-semibold leading-none text-gray-800">{{ __('translation.codes') }}</label>
                                <span class="mx-2 text-gray-400 font-thin">(optional)</span>
                            </div>
                            <textarea class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" rows="8" name="meta_code">{{ $meta->meta_code }}</textarea>
                        </div>
                        
                        <div class="flex items-center justify-center w-full">
                            <button type="submit" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                               {{ __('translation.edit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
