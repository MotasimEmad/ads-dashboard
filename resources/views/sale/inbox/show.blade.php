@extends('layouts.app')
@section('content')
<main class="flex flex-col mt-4 md:flex-row">
        <div class="md:w-3/4 mx-2">
            <div class="mb-2">
                <div class="bg-white rounded-md flex flex-col py-2 px-2" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
                    <div class="mt-1"> {{ __('translation.name') }}: <span class="font-semibold">{{ $message->name }}</span></div>
                    <div class="mt-1"> {{ __('translation.email') }}: <span class="font-semibold">{{ $message->email }}</span></div>
                    <div class="mt-1"> {{ __('translation.phone') }}: <span class="font-semibold">{{ $message->phone }}</span></div>
                    <div class="mt-1"> {{ __('translation.location2') }}: <span class="font-semibold">{{ $message->location }}</span></div>
                    <div class="mt-1"> {{ __('translation.time_to_call') }}: <span class="font-semibold">{{ $message->timetocall }}</span></div>
                </div>
            </div>
        </div>

        <div class="w-full mx-2">
           <textarea 
                disabled
                class="bg-white shadow rounded-lg py-2 px-2 w-full focus:outline-blue-500 mb-3" 
                style="min-height: 200px">{{ $message->questions  }}</textarea>
        </div>
@endsection