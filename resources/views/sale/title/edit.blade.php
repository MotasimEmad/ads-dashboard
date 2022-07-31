@extends('layouts.app')
@section('content')
<script>
    function text(x) {
        if (x == 1) document.getElementById('text_en').style.display = 'none';
        else document.getElementById('text_en').style.display = 'block';
    }
</script>
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
<div class="w-full bg-gray-200 h-screen" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
    <div class="h-96"></div>
    <div class="max-w-5xl mx-auto lg:px-8 mb-12">
        <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
            <form method="POST" action="{{ route('titles.update', $title->id)}}">
                @method('PATCH')
                @csrf
                <div class="mt-10">
                    <div class="flex items-center">
                        <label class="font-semibold leading-none text-gray-800">{{ __('translation.title_ar') }}</label>
                        <span class="mx-2 text-red-600 font-bold text-3xl">*</span>
                    </div>
                    <input value="{{ $title->name_ar }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="name_ar" type="name" />
                </div>

                <div for="email" class="mt-10 font-semibold">{{ __('translation.add_english_title') }}</div>
                <div class="mt-3 mb-3 flex">
                    <div class="mx-2 form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="yes" onclick="text(0)">
                        <label class="form-check-label" for="inlineRadio1">{{ __('translation.yes') }}</label>
                    </div>
                    <div class="mx-2 form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="no" onclick="text(1)" checked>
                        <label class="form-check-label" for="inlineRadio2">{{ __('translation.no') }}</label>
                    </div>
                </div>

                <div class="mt-5" id="text_en" style="display: none;">
                    <div class="flex items-center">
                        <label class="font-semibold leading-none text-gray-800">{{ __('translation.title_en') }}</label>
                        <span class="mx-2 text-gray-400 font-thin">({{ __('translation.optional') }})</span>
                    </div>
                    <input value="{{ $title->name_en }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="name_en" type="name" />
                </div>

                <div class="mt-10">
                    <div class="flex items-center">
                        <label class="font-semibold leading-none text-gray-800">{{ __('translation.text_color') }}</label>
                        <span class="mx-2 text-red-600 font-bold text-3xl">*</span>
                    </div>
                    <input value="{{ $title->text_color }}" type="color" class="w-full mt-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="text_color" />
                </div>

                <div class="mt-10">
                    <div class="flex items-center">
                        <label class="font-semibold leading-none text-gray-800">{{ __('translation.background_color') }}</label>
                        <span class="mx-2 text-red-600 font-bold text-3xl">*</span>
                    </div>
                    <input value="{{ $title->bg_color }}" type="color" class="w-full mt-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="bg_color" />
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
@endsection