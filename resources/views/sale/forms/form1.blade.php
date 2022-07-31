@extends('layouts.app')
@section('content')
    @if(Session::has('success'))
        <div class="flex bg-green-300 rounded-lg p-4 mb-4 text-sm text-green-900" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">{{ __('translation.success') }} !</span> {{ __('translation.saved_success') }}
            </div>
        </div>
    @endif
<div class="w-full bg-gray-200 h-screen">
    <div class="h-96"></div>
    <div class="max-w-5xl mx-auto lg:px-8 py-2">
        <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-96">
            @foreach($forms as $input)
                <form method="POST" action="{{ route('form1.update', $project) }}">
                    @method('PATCH')
                    @csrf
                    <div class="w-full flex items-center justify-end">
                        <label class="mx-2 text-gray-500 font-bold">{{ __('translation.hide_form') }}</label>
                        <label class="switch">
                            <input type="checkbox" name="all_form" value="{{ $input->visible ? 'yes' : 'no' }}" {{ $input->visible == 'yes' ? 'checked' : ''}} />
                            <span class="slider round"></span>
                        </label>
                    </div>
                   <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4">
                        <div class="md:flex items-center mt-12 border border-gray-100 rounded-md py-8 px-4">
                        <div class="w-full flex items-center justify-between">
                            <label class="mx-4 font-semibold leading-none text-gray-800">{{ __('translation.phone_input') }}</label>
                            <label class="switch">
                                <input type="checkbox" value="{{ $input->phone_input ? 'yes' : 'no' }}" name="phone_input" {{ $input->phone_input == 'yes' ? 'checked' : ''}} />
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-12 border border-gray-100 rounded-md py-8 px-4">
                        <div class="w-full flex items-center justify-between">
                            <label class="mx-4 font-semibold leading-none text-gray-800">{{ __('translation.location_input') }}</label>
                            <label class="switch">
                                <input type="checkbox"  value="{{ $input->location_input ? 'yes' : 'no' }}" type="checkbox" name="location_input" {{ $input->location_input == 'yes' ? 'checked' : ''}} />
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-12 border border-gray-100 rounded-md py-8 px-4">
                        <div class="w-full flex items-center justify-between">
                            <label class="mx-4 font-semibold leading-none text-gray-800">{{ __('translation.question_input') }}</label>
                            <label class="switch">
                                <input type="checkbox" value="{{ $input->questions_input ? 'yes' : 'no' }}" type="checkbox" name="questions_input" {{ $input->questions_input == 'yes' ? 'checked' : ''}} />
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-12 border border-gray-100 rounded-md py-8 px-4">
                        <div class="w-full flex items-center justify-between">
                            <label class="mx-4 font-semibold leading-none text-gray-800">{{ __('translation.time_input') }}</label>
                            <label class="switch">
                                <input type="checkbox" value="{{ $input->timetocall_input ? 'yes' : 'no' }}" type="checkbox" name="timetocall_input" {{ $input->timetocall_input == 'yes' ? 'checked' : ''}} />
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                   </div>

                    <div class="flex items-center justify-center w-full">
                        <button type="submit" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                            {{ __('translation.change') }}
                        </button>
                    </div>
                </form>
            @endforeach
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

