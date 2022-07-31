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

<aside class="w-full md:w-64 bg-gray-800 md:min-h-screen">
    <div class="flex items-center justify-between bg-gray-900 p-4 h-16">
        <a href="/" class="flex items-center">
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
    <div class="px-2 py-6 hidden md:flex">
        <ul>
            <li class="px-2 py-3 hover:bg-gray-900 rounded">
                <a href="/" class="flex items-center">
                    <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.dashboard') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/projects" class="flex items-center">
                    <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.projects') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/users" class="flex items-center">
                    <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="mx-2 text-gray-300">{{ __('translation.users') }}</span>
                </a>
            </li>
            <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                <a href="/meta" class="flex items-center">
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
    <ul class="absolute top-0 {{ app()->getLocale() == 'ar' ? 'right-0' : 'left-0' }} bottom-0 w-10/12 py-4 bg-gray-800 drop-shadow-2xl z-10 transition-all"
      :class="openMenu ? 'translate-x-0' : 'translate-x-full'">

   
        <li class="px-2 py-3 hover:bg-gray-900 rounded">
            <a href="/" class="flex items-center">
                <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                     stroke-linejoin="round"
                     stroke-width="2"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="mx-2 text-gray-300">{{ __('translation.dashboard') }}</span>
            </a>
        </li>
        <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
            <a href="/projects" class="flex items-center">
                <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                     stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <span class="mx-2 text-gray-300">{{ __('translation.projects') }}</span>
            </a>
        </li>
        <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
            <a href="/users" class="flex items-center">
                <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                     stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="mx-2 text-gray-300">{{ __('translation.users') }}</span>
            </a>
        </li>
        
        <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
            <a href="/meta" class="flex items-center">
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
    <button class="sm:block absolute top-0 right-0 bottom-0 left-0 text-gray-200" @click="openMenu = !openMenu">
      <svg xmlns="http://www.w3.org/2000/svg" class="fill-current h-6 w-6 absolute top-2 {{ app()->getLocale() == 'ar' ? 'left-2' : 'right-2' }}" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

  </nav>

</body>
</html>