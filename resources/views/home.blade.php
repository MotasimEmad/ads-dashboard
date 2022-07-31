@extends('layouts.app2')

@section('content')

    @if(Session::has('success'))
        <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">{{ __('translation.success') }} !</span> {{ __('translation.approve') }} 
            </div>
        </div>
    @endif
    <div class="mx-auto w-full" style="{{ app()->getLocale() == 'ar' ? 'font-family: Cairo' : 'font-family: Ubuntu' }}">
        <div class="flex flex-col" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
            <!-- Card stats -->
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/3 px-4">
                    <div class="relative flex flex-col min-w-0 bg-white rounded mb-6 xl:mb-0 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-gray-500 uppercase font-bold text-xs">
                                         {{ __('translation.users') }}
                                    </h5>
                                    <span class="font-semibold text-xl text-gray-800">
                                        {{ $users }}
                                    </span>
                                </div>
                                <div class="relative w-auto px-2 flex-initial">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gray-800">
                                        <svg class="w-6 text-gray-200 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-4">
                                <span class="whitespace-no-wrap">
                                     {{ __('translation.there_users') }} {{ $users }} {{ __('translation.users_total') }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-gray-500 uppercase font-bold text-xs">
                                         {{ __('translation.projects') }}
                                    </h5>
                                    <span class="font-semibold text-xl text-gray-800">
                                        {{ $sales }}
                                    </span>
                                </div>
                                <div class="relative w-auto px-2 flex-initial">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gray-800">
                                       <svg class="w-6 text-gray-200" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-4">
                                <span class="whitespace-no-wrap">
                                   {{ __('translation.there_projects') }} {{ $sales }} {{ __('translation.projects_total') }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="mt-12">
            <div class="mt-4">
                <h5 class="my-4 text-gray-500 uppercase font-bold text-2xl" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
                    {{ __('translation.project_request') }}
                </h5>
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-start text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{ __('translation.project_name') }}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        {{ __('translation.sale') }}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                      {{ __('translation.send_at') }}
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                @foreach($projects2 as $project)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="mx-2">
                                                    <div class="text-sm leading-5 font-medium text-gray-900 text-start">{{ $project->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" style="text-align: start">
                                            {{ $project->user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                            {{ $project->created_at->diffForHumans() }}
                                        </td>
                                        <td class="flex justify-between items-center px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm">
                                            <form method="POST" action="{{ route('projects.update', $project->id) }}">
                                                @method('PATCH')
                                                @csrf
                                                <input name="state" value="1" type="hidden" />
                                                <button type="submit" class="mx-2 py-2 px-4 text-white bg-blue-500 rounded-md" href="/{{ $project->name }}">
                                                    {{ __('translation.accept') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="my-4 text-gray-500 uppercase font-bold text-2xl" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
             {{ __('translation.projects') }}
        </h5>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
            @foreach ($projects as $project)
                <div class="flex flex-col border border-gray-800 rounded-md">
                    <div class="flex flex-col py-2 px-2">
                        <a target="blank" href="{{ $project->name }}" class="mt-4 text-2xl font-semibold text-gray-700 group-hover:text-white">{{ $project->name }}</a>
                        <p>{{ __('translation.sale') }}: {{ $project->name }}</p>
                    </div>
                    <div class="text-white text-center bg-indigo-600 py-2">
                        {{ $project->views }} {{ __('translation.views') }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl'}}">
            {{ $projects->links() }}
        </div>
    </div>

@endsection
