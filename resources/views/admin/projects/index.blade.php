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
    <a href="{{ route('projects.create') }}" class="hover:no-underline px-4 py-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
         {{ __('translation.create_new_project') }}
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
                                >
                                {{ __('translation.name') }}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                style="text-align: start">
                                {{ __('translation.sale') }}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                style="text-align: start"> {{ __('translation.view') }}</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                style="text-align: start"> {{ __('translation.hide') }}</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                style="text-align: start"> {{ __('translation.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($projects as $project)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="mx-2">
                                            <div class="text-sm leading-5 font-medium text-gray-900">{{ $project->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $project->user->name }}
                                </td>
                                <td class="flex items-center py-8 px-6 border-b border-gray-200 text-sm">
                                    <a class="mx-2" href="{{ $project->name }}">
                                        <svg class="w-6 h-6 fill-current text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path 
                                                d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="whitespace-no-wrap border-b border-gray-200">
                                    <form method="POST" action="{{ route('hide', $project->id) }}">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit">
                                            <label class="switch">
                                                <input type="checkbox" value="{{ $project->visible == 'yes' ? 'yes' : 'no' }}" name="visible" {{ $project->visible == 'yes' ? 'checked' : ''}} />
                                                <span class="slider round"></span>
                                            </label>
                                        </button>
                                    </form>
                                </td>
                                <td class="whitespace-no-rap border-b border-gray-200">
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
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

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>