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
<div class="w-full py-2 overflow-x-auto sm:-mx-6 sm:px-6" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
    <div class="bg-white w-full shadow rounded p-8 sm:p-12">
        <form action="/store_image" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col">
                <div class="flex items-center">
                    <label class="font-semibold leading-none text-gray-800"> {{ __('translation.image') }}</label>
                    <span class="mx-2 text-gray-400 font-thin">( {{ __('translation.optional') }})</span>
                </div>
                <div>
                    <div id="imagePreview">
                        <img style="height: 20%; width: 30%" class="mt-2" />
                    </div>
                    <input hidden name="img" type="file" id="file" onchange="return fileValidation()" accept="image/png, image/jpeg, image/jpg" />
                    <label for="file" class="mt-2 text-white py-2 px-4 bg-gray-700 hover:bg-gray-600 rounded-md cursor-pointer font-semibold"> {{ __('translation.choose_image') }}</label>
                </div>  
                <div class="mt-4" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start'}}">
                    <label class="font-semibold leading-none text-gray-800">{{ __('translation.image_link') }}<span class="text-gray-400 font-thin">({{ __('translation.optional') }})</span></label>
                    <input name="link_image" class="w-full mt-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" type="text" />
                </div>
                <div class="flex justify-between">
                    <div></div>
                    <button type="submit" class="mt-2 text-white py-2 px-4 bg-gray-700 hover:bg-gray-600 rounded-md cursor-pointer font-semibold"> {{ __('translation.save') }}</button>              
                </div>
            </div>
        </form>
    </div>
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
                            <th class="mb-8 px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start' }}">
                                 {{ __('translation.image') }}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                              style="text-align: start">
                                {{ __('translation.image_link') }}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                              style="text-align: start">
                                {{ __('translation.delete') }}
                            </th>
                            
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($images as $image)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="mx-2">
                                            <div class="flex-shrink-0 mr-2 sm:mr-3"><img src="{{ asset('public/uploads/images/'.$image->img)}}" width="250" height="250"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b border-gray-200">
                                    <form class="mx-2 float-end" action="{{ route('images.update', $image->id) }}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <div class="flex flex-col md:flex-row mt-1">
                                            <input value="{{ $image->link_image }}" name="link_image" class="w-full mx-2 py-3 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white" type="text" />
                                            <button type="submit" class="text-yellow-500 my-2">
                                               {{ __('translation.edit') }}
                                            </button>
                                        </div>
                                    </form>
                                </td>
                                <td class="border-b border-gray-200">
                                    <div class="flex items-center">
                                        <form class="mx-2 float-end" action="{{ route('images.destroy', $image->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="text-red-500">
                                               {{ __('translation.delete') }}
                                            </button>
                                       </form>
                                    </div> 
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
                    swal("{{__('translation.oops')}}", "{{__('translation.wrong_type')}}", "error");
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
        </script>
    @endsection