<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vandrezzer FC</title>

    <!-- Fonts -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('style.css') }}"> --}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('app.97259382.css') }}">

    {{-- @vite('resources/css/app.css') --}}
    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-clipboard@2.x.x/dist/alpine-clipboard.js" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://js.stripe.com/v3/"></script>
    {{-- <style>
        body{
            font-family: jost
        }
    </style> --}}

</head>

<body class="antialiased">
    <div class="  bg-[] border-b border-orange-500 " style="background-image: url({{ asset('images/BlueBG.jpg') }})">
        <div
            class="px-auto mx-auto w-[100%] md:w-[75%] flex flex-col  md:flex-row justify-between items-center text-white">
            <div class="flex flex-row justify-center items-center space-x-4">
                <img src="{{ asset('images/logo.png') }}" class="h-36 border-r pr-5" alt="">
                <p class="uppercase font-jost text-4xl font-bold">Official <br />Supporters <br> Club</p>
            </div>
            @auth

                <div class="w-[100%] md:w-auto px-8 my-4 text-center">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="bg-[#EF7D00] block px-4 w-[100%] py-1 rounded-sm" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </div>
            @endauth


        </div>
    </div>
    @auth
        @if (auth()->user()->type === 'admin')
            <div class="mx-auto bg-[#1D2949] border-b border-orange-500 ">

                <ul
                    class=" text-center flex  flex-col  md:flex-row py-2 pb-0 md:pb-2 mx-auto w-[100%] md:w-[50%] text-white">
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a href={{ route('branch.checklist') }}
                            href="">Supporter Clubs</a></li>
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a href={{ route('forum') }}
                            href="">Forum</a></li>
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a href={{ route('admin.viewpackages') }}>Packages</a></li>
                    <li class=" px-4"><a href={{ route('user.profile') }}>Profile Setting</a></li>
                </ul>
            </div>
        @elseif (auth()->user()->type === 'manager')
            <div class=" bg-[#1D2949] border-b border-orange-500 ">

                <ul
                    class=" text-center flex  flex-col  md:flex-row py-2 pb-0 md:pb-2 mx-auto w-[100%] md:w-[50%] text-white">
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a href={{ route('branch.checklist') }}
                            href="">Checklist</a></li>
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a href={{ route('forum') }}
                            href="">Forum</a></li>

                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a href={{ route('branch.details') }}
                            href="https://store.vandrezzerfc.com/"> Branch Details</a></li>
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a
                            href="{{ route('branch.excos') }}">Branch Excos</a></li>
                    <li class=" px-4"><a href={{ route('user.profile') }}>Profile Setting</a></li>
                </ul>


            </div>
        @else
            <div class=" bg-[#1D2949] border-b border-orange-500 ">

                <ul
                    class=" text-center flex  flex-col  md:flex-row py-2 pb-0 md:pb-2 mx-auto w-[100%] md:w-[50%] text-white">
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a href={{ route('forum') }}
                            href="">Forum</a></li>

                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a href={{ route('user.profile') }}>
                            Profile</a></li>
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a
                            href="{{ route('user.exco.list') }}">Branch Excos</a></li>
                </ul>


            </div>
        @endif
    @endauth

    {{ $slot }}



    {{-- <div class=' bottom-0  footer-container'>

        <div class="links">
            <a to="/">Privacy Policy</a> <span> | </span>
            <a to="/">Terms and Conditions</a> <span> | </span>
            <a to="/">Cookies</a> <span> | </span>
            <a to="/">Contact Us</a> <span> | </span>
            <a to="/">Careers</a>
        </div>


        <p>&copy; Copyright The Vandrezzer Football Club Limited. All rights reserved. </p>
        <p>Developed and maintained by the Vandrezzer FC Meds & Technology Team </p>

    </div> --}}

    <script src="{{asset('build/assets/app.b4da555c.js')}}"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    <x-livewire-alert::scripts />
    <script>
        var elements = stripe.elements();
    </script>
</body>

</html>
