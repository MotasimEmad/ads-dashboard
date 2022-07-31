<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="" x-data="{ openMenu : false }" :class="openMenu ? 'overflow-hidden' : 'overflow-visible' ">

  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>

<aside class="w-full md:w-64 bg-gray-800 md:min-h-screen font-semibold">
    <div class="flex items-center justify-between bg-gray-900 p-4 h-16">
        <a href="/dashboard" class="flex items-center">
            <svg class="w-6" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32.6883 0.335913C32.3407 -0.0248702 31.7929 -0.104067 31.3596 0.142322L19.2249 6.96861L20.3117 1.53926C20.4063 1.06188 20.1797 0.582302 19.7529 0.353512C19.3261 0.126923 18.7981 0.199519 18.455 0.544904L2.96986 16.03C2.94127 16.052 2.91487 16.0762 2.89067 16.1026C1.02735 17.9945 0 20.4804 0 23.1005C0 28.5584 4.4416 33 9.89955 33C12.5218 33 15.0077 31.9727 16.8974 30.1115C16.926 30.0829 16.9502 30.0543 16.9766 30.0235L30.1232 16.8792C30.4532 16.5492 30.539 16.0454 30.3366 15.6252C30.1364 15.205 29.6876 14.9674 29.2235 15.0092L24.4409 15.5394L32.8379 1.67125C33.0975 1.24227 33.0381 0.694497 32.6883 0.335913ZM9.89955 29.7002C6.25431 29.7002 3.29985 26.7457 3.29985 23.1005C3.29985 19.4552 6.25431 16.5008 9.89955 16.5008C13.5448 16.5008 16.4992 19.4552 16.4992 23.1005C16.4992 26.7457 13.5448 29.7002 9.89955 29.7002Z" fill="#667EEA"/>
            </svg>

            <span class="text-gray-300 text-xl font-semibold mx-2">{{ __('translation.dashboard') }}</span>
        </a>
         <div class="flex items-center md:hidden">
            <div class="links mx-2">
                <div class="dropdown">
                    <button class="btn bg-gray-700 hover:bg-gray-600 text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('translation.btn')}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('switchLan','en') }}">{{ __('translation.english') }}</a>
                        <a class="dropdown-item" href="{{ route('switchLan','ar') }}"> {{ __('translation.arabic') }}</a>
                    </div>
                </div>
            </div>  
            
            <div class="flex">
                <button type="button" class="flex md:hidden flex-col items-center align-middle text-gray-200" @click="openMenu = !openMenu">
                    <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="px-2 py-6 hidden md:block {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">
        <ul>
            <li class="px-2 py-3 hover:bg-gray-900 rounded">
                <a href="/dashboard" class="flex items-center">
                    <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.dashboard') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/general/{{ \App\Models\Project::where(['user_id' => Auth::user()->id])->pluck('id')->first() }}/edit" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.website_info') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/contact/{{ \App\Models\Project::where(['user_id' => Auth::user()->id])->pluck('id')->first() }}" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.contact') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/social/{{ \App\Models\Project::where(['user_id' => Auth::user()->id])->pluck('id')->first() }}" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.social_links') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/images/{{ \App\Models\Project::where(['user_id' => Auth::user()->id])->pluck('id')->first() }}" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.images') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/titles" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.titles') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/inboxes" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.inbox') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/form1" class="flex items-center">
                  <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.form_one') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/form2" class="flex items-center">
                  <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.form_two') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="sale/meta" class="flex items-center">
                    <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.codes') }}</span>
                </a>
            </li>
           
        </ul>
    </div>
</aside>


  <!-- Pop Out Navigation -->
  <nav class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10" :class="openMenu ? 'visible' : 'invisible' " x-cloak>

    <!-- UL Links -->
    <ul class="absolute top-0 {{ app()->getLocale() == 'ar' ? 'right-0' : 'left-0' }} bottom-0 w-10/12 py-4 bg-gray-800 drop-shadow-2xl z-10 transition-all overflow-y-auto min-h-screen"
      :class="openMenu ? 'translate-x-0' : 'translate-x-full'">
            <li class="px-2 py-3 hover:bg-gray-900 rounded mx-2">
                <a href="http://www.cssix.com/{{ $project->name}}"class="w-full btn bg-gray-700 hover:bg-gray-600 text-white transition duration-300 ease-in-out transform hover:-translate-y-1">
                   {{ __('translation.visit_website') }}
                </a>
            </li>
            
            <li class="px-2 py-3 hover:bg-gray-900 rounded mx-2">
               <button onclick="myFunction()" class="w-full btn bg-gray-700 hover:bg-gray-600 text-white transition duration-500 ease-in-out transform hover:-translate-y-1">
                    {{__('translation.copy_url')}}
                </button>
                <input disabled id="myInput" value="https://www.cssix.com/{{ $project->name }}" class="hidden mx-2 btn text-sm font-semibold text-center text-gray-800 transition-colors duration-200 transform bg-transparent border border-gray-800 rounded-md w-96" />
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded">
                <a href="/dashboard" class="flex items-center">
                    <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.dashboard') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/general/{{ \App\Models\Project::where(['user_id' => Auth::user()->id])->pluck('id')->first() }}/edit" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.website_info') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/contact/{{ \App\Models\Project::where(['user_id' => Auth::user()->id])->pluck('id')->first() }}" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.contact') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/social/{{ \App\Models\Project::where(['user_id' => Auth::user()->id])->pluck('id')->first() }}" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.social_links') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/images/{{ \App\Models\Project::where(['user_id' => Auth::user()->id])->pluck('id')->first() }}" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.images') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/titles" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.titles') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/inboxes" class="flex items-center">
                   <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.inbox') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/form1" class="flex items-center">
                  <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.form_one') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/form2" class="flex items-center">
                  <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                   <span class="mx-2 text-gray-300">{{ __('translation.form_two') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="sale/meta" class="flex items-center">
                    <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.codes') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center">
                    <svg class="w-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
    
    </ul>

    <!-- Close Button -->
    <button class="absolute top-0 right-0 bottom-0 left-0 text-gray-200" @click="openMenu = !openMenu">
      <svg xmlns="http://www.w3.org/2000/svg" class="fill-current h-6 w-6 absolute top-2 {{ app()->getLocale() == 'ar' ? 'left-2' : 'right-2' }}" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

  </nav>

</body>
</html>