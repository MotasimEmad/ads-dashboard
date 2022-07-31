@extends('layouts.app2')
@section('content')
    @if(Session::has('success'))
        <div class="flex bg-green-300 rounded-lg p-4 mb-4 text-sm text-green-900" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">{{ __('translation.success') }} !</span> {{ __('translation.saved_success') }}
            </div>
        </div>
    @endif
    
<div class="flex justify-end">
    <a href="{{ route('users.create') }}" class="hover:no-underline px-4 py-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
        {{ __('translation.create_new_user') }}
    </a>
</div>

<div class="mt-12">
    <div class="mt-4">
        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                style="text-align: start">
                                {{ __('translation.name') }}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                style="text-align: start">
                                {{ __('translation.role') }}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('translation.delete') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" style="text-align: start">
                                    <div class="flex items-center">
                                        <div class="mx-2">
                                            <div class="text-sm leading-5 font-medium text-gray-900">{{ $user->name }}</div>
                                            <div class="text-sm leading-5 text-gray-500">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500" style="{{ app()->getLocale() == 'ar' ? 'text-align: start' : 'text-align: start' }}">
                                    {{ $user->role }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="text-red-500">
                                            {{ __('translation.delete') }}
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
@endsection