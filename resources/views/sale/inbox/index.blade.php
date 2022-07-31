@extends('layouts.app')
@section('content')
<div class="mt-12">
     <div class="sm:px-6 w-full">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> {{ __('translation.inbox') }}</p>
            </div>
        </div>
        @if ($inboxes->isEmpty())
            <div class="flex flex-col items-center">
                <img class="my-4" src="{{ asset('public/images/no_message.svg') }}" />
                <h1 class="font-semibold text-xl">{{ __('translation.no_messages') }}</h1>
            </div>
        @else    
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
        @endif
    </div>
</div>
@endsection