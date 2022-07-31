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
            <div class="w-full px-2 lg:px-8 mb-12">
                <div class="bg-white w-full shadow rounded p-8 -mt-96 flex flex-col">
                    <form method="POST" action="{{ route('general.update', $info->id ) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="w-full flex items-center justify-end">
                            <label class="mx-2 text-gray-500 font-bold">{{ __('translation.add_english') }}</label>
                            <label class="switch">
                                <input type="checkbox" name="en" value="{{ $info->en ? 'yes' : 'no' }}" {{ $info->en == 'yes' ? 'checked' : ''}} />
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="border border-gray-200 rounder-md py-2 px-6 mx-2">
                                <div class="flex items-center">
                                    <label class="font-semibold leading-none text-gray-800">{{ __('translation.logo') }}</label>
                                    <span class="mx-2 text-gray-400 font-thin">({{ __('translation.optional') }})</span>
                                </div>
                                <div id="logoPreview">
                                    <img style="height: 20%; width: 30%" class="mt-2" src="{{ asset('public/uploads/logo/'.$info->logo) }}" />
                                </div>
                                <input hidden name="logo" type="file" id="logo" onchange="return logoValidation()" accept="image/png, image/jpeg, image/jpg, image/svg" />
                                <label for="logo" class="mt-2 text-white py-2 px-4 bg-gray-700 hover:bg-gray-600 rounded-md cursor-pointer font-semibold text-sm">{{ __('translation.choose_logo') }}</label>
                            </div>
                            <div class="border border-gray-200 rounder-md py-2 px-6 mx-2 sm:mt-4 md:mt-0">
                                <div class="flex items-center">
                                    <label class="font-semibold leading-none text-gray-800">{{ __('translation.background_image') }}</label>
                                    <span class="mx-2 text-gray-400 font-thin">({{ __('translation.optional') }})</span>
                                </div>
                                <div id="imagePreview">
                                    <img style="height: 20%; width: 30%" class="mt-2" src="{{ asset('public/uploads/temp/'.$info->bg_img) }}" />
                                </div>
                                <input hidden name="bg_img" type="file" id="file" onchange="return fileValidation()" accept="image/png, image/jpeg, image/jpg" />
                                <label for="file" class="mt-2 text-white py-2 px-4 bg-gray-700 hover:bg-gray-600 rounded-md cursor-pointer font-semibold  text-sm">{{ __('translation.choose_image') }}</label>
                            </div>
                        </div>
                        <div class="mt-10">
                            <div class="flex items-center">
                                <label class="font-semibold leading-none text-gray-800">{{ __('translation.about_ar') }}</label>
                                <span class="mx-2 text-red-600 font-bold text-3xl">*</span>
                            </div>
                            <textarea class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" rows="5" name="about_ar">{{ $info->about_ar }}</textarea>
                        </div>
                        <div class="mt-10">
                            <div class="flex items-center">
                                <label class="font-semibold leading-none text-gray-800">{{ __('translation.about_en') }}</label>
                                <span class="mx-2 text-gray-400 font-thin">({{ __('translation.optional') }})</span>
                              </div>
                            <textarea class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" rows="5" name="about_en">{{ $info->about_en }}</textarea>
                        </div>
                        <div class="mt-10" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
                            <label class="font-semibold leading-none text-gray-800">{{ __('translation.youtube_link') }} <span class="text-gray-400 font-thin">({{ __('translation.optional') }})</span></label>
                            <input value="{{ $info->youtube_link }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="youtube_link" type="text" />
                        </div>
                         <div class="mt-10" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
                            <label class="font-semibold leading-none text-gray-800">{{ __('translation.location') }} <span class="text-gray-400 font-thin">({{ __('translation.optional') }})</span></label>
                            <input value="{{ $info->map }}" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" name="map" type="text" />
                        </div>

                        <input value="{{ $info->site_email }}" name="site_email" type="hidden" />
                        <input value="{{ $info->whatsapp_number }}" name="whatsapp_number" type="hidden" />
                        <input value="{{ $info->phone_number }}" name="phone_number" type="hidden" />

                        <div class="flex items-center justify-center w-full">
                            <button type="submit" class="mt-8 font-semibold leading-none text-white py-4 px-10 bg-gray-800 rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700 focus:outline-none">
                                {{ __('translation.edit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @section('scripts')
        <script>
            function fileValidation() {
                var fileInput = 
                    document.getElementById('file');
                  
                var filePath = fileInput.value;
              
                // Allowing file type
                var allowedExtensions = 
                        /(\.jpg|\.jpeg|\.png)$/i;
                  
                if (!allowedExtensions.exec(filePath)) {
                    swal("Oops", "Seem like you choose wrong image type!. try PNG, JPG, or JPEG", "error");
                    fileInput.value = '';
                    return false;
                } 
                else 
                {
                  
                    // Image preview
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById(
                                'imagePreview').innerHTML = 
                                '<img style="height: 20%; width: 30%" class="mt-2" src="' + e.target.result
                                + '"/>';
                        };
                       
                          
                        reader.readAsDataURL(fileInput.files[0]);
                    }
                }
            }
            
             function logoValidation() {
                var fileInput = 
                    document.getElementById('logo');
                  
                var filePath = fileInput.value;
              
                // Allowing file type
                var allowedExtensions = 
                        /(\.jpg|\.jpeg|\.png|\.svg)$/i;
                  
                if (!allowedExtensions.exec(filePath)) {
                    swal("Oops", "Seem like you choose wrong image type!. try SVG, PNG, JPG, or JPEG", "error");
                    fileInput.value = '';
                    return false;
                } 
                else 
                {
                  
                    // Image preview
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById(
                                'logoPreview').innerHTML = 
                                '<img style="height: 20%; width: 30%" class="mt-2" src="' + e.target.result
                                + '"/>';
                        };
                       
                          
                        reader.readAsDataURL(fileInput.files[0]);
                    }
                }
            }
        </script>
    @endsection
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

