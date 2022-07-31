@extends('layouts.app2')
@section('content')
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
<div class="w-full bg-gray-200 h-screen" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
    <div class="h-96"></div>
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="md:flex items-center mt-12">
                    <div class="mx-2 w-full md:w-1/2 flex flex-col">
                        <label class="leading-none text-gray-800">{{ __('translation.name') }}</label>
                        <input name="name" type="text" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" />
                    </div>
                    <div class="mx-2 w-full md:w-1/2 flex flex-col md:ml-6 mt-4 md:mt-0">
                        <label class="leading-none text-gray-800">{{ __('translation.sale') }}</label>
                        <select name="user_id" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white">
                            @foreach($sales as $sale)
                                <option value="{{ $sale->id }}">{{ $sale->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="flex items-center justify-center w-full">
                    <button class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                       {{ __('translation.add') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
