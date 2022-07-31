@extends('layouts.app')
@section('content')
    @if(Session::has('success'))
        <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">{{ __('translation.success') }} !</span> {{ __('translation.saved_success') }}
            </div>
        </div>
    @endif
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
    @foreach ($information as $info)
        <div class="w-full bg-gray-200">
            <div class="h-96"></div>
            <div class="w-full lg:px-8 mb-12">
                <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-96 flex flex-col">
                    <form method="POST" action="{{ route('general.update', $info->id ) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="mt-10">
                            <div class="flex items-center">
                              <label class="font-semibold leading-none text-gray-800">{{ __('translation.site_email') }}</label>
                              <span class="mx-2 text-red-600 font-bold text-3xl">*</span>
                            </div>
                            <input value="{{ $info->site_email }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="site_email" type="email" />
                        </div>

                        <div class="mt-10">
                            <div class="flex items-center">
                              <label class="font-semibold leading-none text-gray-800">{{ __('translation.whatsapp_number') }}</label>
                              <span class="mx-2 text-gray-400 font-thin">({{ __('translation.optional') }})</span>
                            </div>
                            <div class="flex items-center mt-2">
                              <label class="mx-2 font-semibold leading-none text-gray-800 border border-gray-200 py-3 px-4 rounded">+971</label>
                              <input id="tel_input" value="{{ $info->whatsapp_number }}" name="whatsapp_number" type="tel" class="w-full py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                            </div>
                        </div>
                        
                        <div class="mt-10">
                          <div class="flex items-center">
                            <label class="font-semibold leading-none text-gray-800">{{ __('translation.phone_number') }}</label>
                            <span class="mx-2 text-gray-400 font-thin">({{ __('translation.optional') }})</span>
                          </div>
                          <div class="flex items-center mt-2">
                            <label class="mx-2 font-semibold leading-none text-gray-800 border border-gray-200 py-3 px-4 rounded">+971</label>
                            <input id="tel_input" value="{{ $info->phone_number }}" name="phone_number" type="tel" class="w-full py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                          </div>
                      </div>

                      <img hidden style="height: 20%; width: 30%" class="mt-2" name="bg_img" src="{{ URL::asset('uploads/temp/'.$info->bg_img) }}" />
                      <input value="{{ $info->about_ar }}" name="about_ar" type="hidden" />
                      <input value="{{ $info->about_en }}" name="about_en" type="hidden" />
                      <input value="{{ $info->youtube_link }}" name="youtube_link" type="hidden" />

                        <div class="flex items-center justify-center w-full">
                            <button type="submit" class="mt-8 font-semibold leading-none text-white py-4 px-10 bg-gray-800 rounded hover:bg-gray-600 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700 focus:outline-none">
                                {{ __('translation.edit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection