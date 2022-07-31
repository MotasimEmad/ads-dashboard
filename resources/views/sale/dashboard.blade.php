@extends('layouts.app')
@section('content')
<div class="mx-auto w-full">
    <div>
        <!-- Card stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 -mx-4 justify-center" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
            <div class="w-full px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    @foreach($whatsapps as $what)
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-gray-500 uppercase font-bold text-xs">
                                          {{ __('translation.clicks') }}
                                    </h5>
                                    <span class="font-semibold text-xl text-gray-800">
                                        {{ $what->whatsapp_total }}
                                    </span>
                                </div>
                                <div class="relative w-auto px-2 flex-initial">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gray-600">
                                        <img src="{{ asset('./images/whatsapp.svg') }}" class="w-5 h-5 fill-current text-white" />
                                        <!--<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>-->
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-4">
                                <span class="whitespace-no-wrap">
                                        {{ $what->whatsapp_total }} {{ __('translation.whatsapp_clicks') }}
                                </span>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    @foreach($phones as $pho)
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-gray-500 uppercase font-bold text-xs">
                                         {{ __('translation.clicks') }}
                                    </h5>
                                    <span class="font-semibold text-xl text-gray-800">
                                        {{ $pho->phone_total }}
                                    </span>
                                </div>
                                <div class="relative w-auto px-2 flex-initial">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gray-600">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-4">
                                <span class="whitespace-no-wrap">
                                        {{ $pho->phone_total }} {{ __('translation.phone_clicks') }}
                                </span>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
             <div class="w-full px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap">
                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                <h5 class="text-gray-500 uppercase font-bold text-xs">
                                     {{ __('translation.view_web') }}
                                </h5>
                                <span class="font-semibold text-xl text-gray-800">
                                    {{ $views }}
                                </span>
                            </div>
                            <div class="relative w-auto px-2 flex-initial">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gray-600">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-4">
                            <span class="whitespace-no-wrap">
                                    {{ $views }} {{ __('translation.views') }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($inboxes->isEmpty())
        <div class="flex flex-col items-center">
            <img class="my-4" src="{{ asset('public/images/no_message.svg') }}" />
            <h1 class="font-semibold text-xl">{{ __('translation.no_messages') }}</h1>
        </div>
    @else
        <div class="sm:px-6 w-full">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                    {{ __('translation.inbox') }}
                </p>
            </div>
        </div>
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tbody>
                        @foreach($inboxes as $inbox)
                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $inbox->name }}</p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <div class="flex items-center">
                                        <p class="text-sm leading-none text-gray-600 ml-2">{{ $inbox->email }}</p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <button class="py-3 px-3 text-sm focus:outline-none leading-none text-gray-700 bg-gray-100 rounded">{{ $inbox->created_at->diffForHumans() }}</button>
                                </td>
                                <td class="pl-4">
                                    <a class="hover:no-underline focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none modal-open" href="/message/{{ $inbox->id }}">
                                        {{ __('translation.view') }}
                                    </a>
                                </td>
                            </tr>
                            <tr class="h-3"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $inboxes->links() }}
        </div>
    </div>
    @endif
            <script src="./index.js"></script>
            <style>.checkbox:checked + .check-icon {
      display: flex;
    }
    </style>
</div>
@endsection