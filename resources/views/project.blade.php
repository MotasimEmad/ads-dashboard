<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    
        <title>{{ $project_name }}</title>
        <meta name="description" content="{{ $about_site }}"/>
        <meta name="keywords" content="{{ $project_name }}"/>
        <meta name="author" content="Imrahana"/>
        <x-embed-styles />
    
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500&display=swap" rel="stylesheet">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/'.$logo) }}"/>


        {{-- <link rel="stylesheet" href="{{ asset('public/libs/bootstrap/css/bootstrap.min.css') }}" media="all" /> --}}
        <link rel="stylesheet" href="{{ asset('libs/fontawesome/css/font-awesome.min.css') }}" media="all" />
        <link rel="stylesheet" href="{{ asset('libs/maginificpopup/magnific-popup.css') }}" media="all" />

        <link rel="stylesheet" href="{{ asset('libs/timer/TimeCircles.css') }}" media="all" />

        <link rel="stylesheet" href="{{ asset('libs/owlcarousel/owl.carousel.min.css') }}" media="all" />
        <link rel="stylesheet" href="{{ asset('libs/owlcarousel/owl.theme.default.min.css') }}" media="all" />

        <link id="lgx-master-style" rel="stylesheet" href="{{ asset('css/style-default.min.css') }}" media="all"/>
        <link rel="stylesheet" href="{{ asset('css/phoneicon.scss') }}" media="all"/>

        <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
        @if(app()->getLocale() == 'en')
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        @else
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
        @endif
        
          <div class="hidden">
              {{ $meta }}
          </div>

          <x-embed-styles />
    </head>
    
    <body dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" style="{{ app()->getLocale() == 'ar' ? 'font-family: Cairo' : 'font-family: Ubuntu' }}">
        <section>
            @foreach($information as $info)
                <div class="lgx-banner" style="background-attachment: fixed; background-position: center center; -moz-background-size: cover; -o-background-size: cover; -webkit-background-size: cover; background-repeat: no-repeat; background-image: url('https://images.unsplash.com/photo-1653287805984-2997464e5689?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=411');">
            @endforeach
                @if ($en == 'yes')
                    <div class="links" style="{{ app()->getLocale() == 'en' ? '' : 'text-align: start' }}">
                        <div class="dropdown">
                            <button class="flex items-center px-4 bg-gray-700 hover:bg-gray-600 text-white dropdown-toggle rounded-b-md mx-2 py-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="mx-2 w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                {{__('translation.btn')}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-3xl" href="{{ route('switchLan','en') }}"> {{ __('translation.english') }}</a>
                                <a class="dropdown-item text-3xl" href="{{ route('switchLan','ar') }}"> {{ __('translation.arabic') }}</a>
                            </div>
                        </div>
                    </div>  
                @endif
                <div class="px-4 py-4">
                    @if(Session::has('success'))
                        <div class="flex justify-center items-center font-medium py-4 px-4 rounded-md text-green-100 bg-green-700 border border-green-700">
                            <div slot="avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <div class="text-2xl font-normal  max-w-full flex-initial">
                                <div class="py-2">{{ __('translation.msg') }}
                                    <div class="text-2xl font-base">{{ __('translation.thank') }} <span class="uppercase font-bold">{{ __('translation.con') }}</span>.</div>
                                </div>
                            </div>
                            <div></div>
                        </div>
                    @endif
                </div>
                <div class="lgx-banner lgx-banner4">
                    <div class="lgx-banner-style">
                        <div class="lgx-inner lgx-inner-fixed">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    <div class="lgx-about-content-area">
                                        <div class="lgx-heading">
                                            @foreach ($titles as $title)
                                                @if(app()->getLocale() == 'ar')
                                                    <h3 class="heading lgx-btn py-12 px-12 rounded-2xl text-4xl md:text-5xl bg-[{{ $title->bg_color }}] text-[{{ $title->text_color }}] transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:rounded-2xl"> {{ $title->name_ar }} </h3><br>
                                                @elseif(app()->getLocale() == 'en' && empty($title->name_en))
                                                    <h3 class="heading lgx-btn hidden py-12 px-12 rounded-2xl text-4xl md:text-5xl bg-[{{ $title->bg_color }}] text-[{{ $title->text_color }}] transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:rounded-2xl"> {{ $title->name_en }} </h3><br>
                                                @elseif(app()->getLocale() == 'en' && empty(!$title->name_en))
                                                    <h3 class="heading lgx-btn py-12 px-12 rounded-2xl text-4xl md:text-5xl bg-[{{ $title->bg_color }}] text-[{{ $title->text_color }}] transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:rounded-2xl"> {{ $title->name_en }} </h3><br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @foreach($forms1 as $form)
                                    @if($form->visible == 'yes')
                                        <div class="col-sm-12 col-md-5">
                                            <div class="lgx-about-img-sp">
                                                <div class="lgx-banner-info lgx-banner-info-center"> 
                                                    <h2 class="heading " style="text-align:center">
                                                        {{ __('translation.dear_customer') }}
                                                    </h2>     
                                                    <form method="POST" class="lgx-contactform" action="/inbox/insert/{{ $project_id }}">
                                                        @csrf
                                                        @foreach($information as $info)
                                                            <input type="hidden" value="{{ $info->site_email }}" name="site_email" />
                                                        @endforeach
                                                        <div class="w-full">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control lgxname {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="name" id="name" placeholder=" {{ __('translation.name') }}"   >
                                                                 @error('name')
                                                                    <p class="text-red-500 text-xl font-bold">
                                                                        {{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="w-full">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control lgxemail {{ app()->getLocale() == 'en' ? 'text-left' : '' }}"  name="email" id="email" aria-describedby="emailHelp" placeholder=" {{ __('translation.email') }}"   >
                                                                @error('email')
                                                                    <p class="text-red-500 text-xl mt-1">
                                                                        {{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        @foreach($forms1 as $form)

                                                            @if($form->phone_input == 'yes')
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control lgxname {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="phone" id="phone" placeholder=" {{ __('translation.phone') }}"  >
                                                                </div>
                                                            @endif
                        
                                                            @if($form->location_input == 'yes')
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control lgxsubject {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="location" id="location" placeholder=" {{ __('translation.location2') }}"   >
                                                                </div>
                                                            @endif
                                                        
                                                            @if($form->questions_input == 'yes')
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control lgxsubject {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="questions" id="questions" placeholder=" {{ __('translation.question') }}"   >
                                                                </div>
                                                            @endif
                                                        
                                                            @if($form->timetocall_input == 'yes')
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control lgxsubject {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="timetocall" id="timetocall" placeholder="{{ __('translation.time_to_call') }}"   >
                                                                </div>
                                                            @endif

                                                        @endforeach
            
                                                            <button type="submit" name="submit" class="lgx-btn hvr-glow hvr-radial-out lgxsend lgx-send " style="background: #004d70; font-size: 20px; border-radius:16px;"> &nbsp;&nbsp;<span>{{ __('translation.register_now') }}</span>&nbsp;&nbsp;</button>
                                                        </br>

                                                        @foreach($information as $info)
                                                            @if($info->whatsapp_number != NULL)
                                                                <div class="lgx-btn hvr-glow hvr-radial-out lgxsend lgx-send" style="background: #00d600;font-size: 20px; color:#fff; border-radius:16px;"><a href="https://wa.me/{{ $info->whatsapp_number }}"> <span>{{ __('translation.throu_whatsapp') }}</span> </a> </div>
                                                            @endif
                                                        @endforeach
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        @foreach ($information as $info)
            <section>
                <div class="lgx-about flex flex-col md:flex-row items-center px-4 py-4">
                   <div class="col-sm-12 col-md-5">
                        <div class="lgx-about-img-sp1">
                         	<div class="video-container1"> 
                                @if ($info->youtube_link != NULL)
                                    <x-embed url="{{ $info->youtube_link }}" aspect-ratio="4:3" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mx-2 w-full md:w-1/2 mt-6 md:mt-0">
                        <div class="rounded-lg py-2 px-4 bg-gray-200">
                            <div class="" style="text-align: right;">
                                <br>
                                @if(app()->getLocale() == 'ar')
                                    <p class="">{{ $info->about_ar }}</p><br>
                                @else
                                    <p class="text">{{ $info->about_en }}</p><br>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @if($info->phone_number != NULL)
                <a onclick="phone({{ $project_id }})" href="tel:+971{{ $info->phone_number }}" target="_blank">
                    <div class="icon-bar4">
                        <div class="pulse">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            @endif
            <br>
            <br>
    
            @if($info->whatsapp_number != NULL)
                <div class="icon-bar3"> 
                    <div class="phone-call cbh-phone cbh-green cbh-show  cbh-static" id="clbh_phone_div" style="">
                        <a onclick="whatsapp({{ $project_id }})"  href="https://wa.me/+971{{ $info->whatsapp_number }}" target="_blank"  class="phoneJs" title="WhatsApp 360imagem">
                            <div class="cbh-ph-circle"></div><div class="cbh-ph-circle-fill"></div>
                            <div class="cbh-ph-img-circle1"></div>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
        
        <div class="grid grid-cols-2 gap-8 mt-8 xl:mt-16 md:grid-cols-3 xl:grid-cols-4 px-14">
            @foreach ($images as $image)
                <a href="{{ $image->link_image }}" target="blank">
                    <img class="object-cover w-full rounded-xl aspect-square transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:rounded-2xl" src="uploads/images/{{ $image->img }}" alt="">
                </a>
            @endforeach
        </div>
        
        @foreach($information as $info)
            @if($info->logo)
                <div class="mt-8 flex justify-center">
                    <img src="{{ asset('uploads/logo/'. $info->logo) }}" class="h-40" />
                </div>
            @endif
        @endforeach

        @foreach($forms2 as $form)
            @if($form->visible == 'yes')
                <div class="md:mt-12 ml-4 mr-4 lg:ml-72 lg:mr-72 my-6">
                    <div class="lgx-about-img-sp">
                        <div class="lgx-banner-info lgx-banner-info-center"> 
                            <h2 class="heading " style="text-align:center"> 
                                 {{ __('translation.dear_customer') }}
                            </h2>     
                            <form method="POST" class="lgx-contactform"  action="/inbox/insert/{{ $project_id }}">
                                @csrf
                                @foreach($information as $info)
                                    <input type="hidden" value="{{ $info->site_email }}" name="site_email" />
                                @endforeach
                                <div class="form-group">
                                    <input type="text" class="form-control lgxname {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="name" id="name" placeholder=" {{ __('translation.name') }}"   >
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control lgxemail {{ app()->getLocale() == 'en' ? 'text-left' : '' }}"  name="email" id="email" aria-describedby="emailHelp" placeholder=" {{ __('translation.email') }}"   >
                                </div>

                                @foreach($forms2 as $form)

                                    @if($form->phone_input == 'yes')
                                        <div class="form-group">
                                            <input type="text" class="form-control lgxname {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="phone" id="phone" placeholder=" {{ __('translation.phone') }}"  >
                                        </div>
                                    @endif

                                    @if($form->location_input == 'yes')
                                        <div class="form-group">
                                            <input type="text" class="form-control lgxsubject {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="location" id="location" placeholder=" {{ __('translation.location2') }}"   >
                                        </div>
                                    @endif
                                
                                    @if($form->questions_input == 'yes')
                                        <div class="form-group">
                                            <input type="text" class="form-control lgxsubject {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="questions" id="questions" placeholder=" {{ __('translation.question') }}"   >
                                        </div>
                                    @endif
                                
                                    @if($form->timetocall_input == 'yes')
                                        <div class="form-group">
                                            <input type="text" class="form-control lgxsubject {{ app()->getLocale() == 'en' ? 'text-left' : '' }}" name="timetocall" id="timetocall" placeholder=" {{ __('translation.time_to_call') }}"   >
                                        </div>
                                    @endif

                                @endforeach

                                    <button type="submit" name="submit" class="lgx-btn hvr-glow hvr-radial-out lgxsend lgx-send" style="background: #004d70; font-size: 20px; border-radius:16px;"> &nbsp;&nbsp;<span> {{ __('translation.register_now') }}</span>&nbsp;&nbsp;</button>
                                </br>

                                @foreach($information as $info)
                                    @if($info->whatsapp_number != NULL)
                                        <div class="lgx-btn hvr-glow hvr-radial-out lgxsend lgx-send" style="background: #00d600;font-size: 20px; color:#fff; border-radius:16px;"><a href="https://wa.me/{{ $info->whatsapp_number }}"> <span>{{ __('translation.throu_whatsapp') }}</span></a> </div>
                                    @endif
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <div class="container mt-24 mb-8 mx-auto flex justify-center">
            @foreach ($socials as $social)
                @if($social->facebook_link != NULL)
                    <a href="{{ $social->facebook_link }}" target="_blank">
                        <img src="{{ asset('public/images/facebook.svg')}}" class="mx-4 w-16 h-16 hover:animate-bounce" />
                    </a>
                @endif
                @if($social->twitter_link != NULL)
                    <a href="{{ $social->twitter_link }}" target="_blank">
                        <img src="{{ asset('public/images/twitter.svg')}}" class="mx-4 w-16 h-16 hover:animate-bounce" />
                    </a>
                @endif
                @if($social->instagram_link != NULL)
                    <a href="{{ $social->instagram_link }}" target="_blank">
                        <img src="{{ asset('public/images/instagram.svg')}}" class="mx-4 w-16 h-16 hover:animate-bounce" />
                    </a>
                @endif
                @if($social->snapchat_link != NULL)
                    <a href="{{ $social->snapchat_link }}" target="_blank">
                        <img src="{{ asset('public/images/snapchat.svg')}}" class="mx-4 w-16 h-16 hover:animate-bounce" />
                    </a>
                @endif
            @endforeach
            @foreach($information as $info)
                @if($info->map != NULL)
                    <a href="{{ $info->map }}" target="_blank">
                        <img src="{{ asset('public/images/google_map.svg')}}" class="mx-4 w-18 h-16 hover:animate-bounce" />
                    </a>
                @endif
            @endforeach
        </div>
        
        <div class="bottom bg-gray-300 py-4"> 
            <div class="container animate-pulse"> 
                <a href="https://www.alkhaaldi.ae" target="_blank" class="flex justify-center"> 
                    <img src="{{ asset('public/alkhaaldi_logo.png') }}" class="h-12" />
                    <div class="mx-2 text-gray-800 font-semibold">Alkhaaldi</div>
                    <section class="span4">  
                        <a href="javascript:scrollToTop()" title="top of page"><div class="topofpage"></div></a>
                    </section> 
                </a> 
            </div>
        </div>

        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
        
      
        <script src="assets/libs/jquery.smooth-scroll.js"></script>

        <script src="assets/libs/jquery.validate.js"></script>
    
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQvRGGtL6OrpP5xVMxq_0NgiMiRhm3ycI"></script>

        <script type="text/javascript" src="assets/libs/gmap/jquery.googlemap.js"></script>

        <script type="text/javascript" src="assets/libs/maginificpopup/jquery.magnific-popup.min.js"></script>

        <script src="assets/libs/owlcarousel/owl.carousel.min.js"></script>

        <script src="assets/libs/countdown.js"></script>
        <script src="assets/libs/timer/TimeCircles.js"></script>

        <script src="assets/libs/waypoints.min.js"></script>
        <script src="assets/libs/counterup/jquery.counterup.min.js"></script>

        <script src="assets/libs/jquery.smooth-scroll.min.js"></script>
        <script src="assets/libs/jquery.easing.min.js"></script>

        <script src="assets/libs/typed/typed.min.js"></script>
        

        <script src="assets/libs/header-parallax.js"></script>

        
        <script src="assets/libs/instafeed.min.js"></script>
        

        <script src="assets/js/custom.script.js"></script>
    </body>
    
</html>

@include('layouts.project_script')

