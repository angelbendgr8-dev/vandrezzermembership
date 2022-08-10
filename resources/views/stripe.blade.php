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
    <link rel="stylesheet" href="{{ asset('app.51d85903.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{--  @vite('resources/css/app.css')  --}}
    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>


    <script defer src="https://js.stripe.com/v2/"></script>
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
                    <li class="border-b border-r-0 md:border-r md:border-b-0 px-4"><a
                            href={{ route('admin.viewpackages') }}>Packages</a></li>
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


    <div class="mx-auto w-[100%] md:w-[50%]">
        <div class="   shadow-xl bg-white pt-4 pb-16 mt-4">
            <form role="form" action="{{ route('stripe.process.payment') }}" method="post"
                class="require-validation px-12 flex flex-col  justify-center" data-cc-on-file="false"
                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf


                <div class='flex flex-col  w-[100%]'>
                    <div class='flex flex-col required'>
                        <label class='control-label'>Name on Card</label>
                        <input class=' p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' type='text'>
                    </div>
                    <div class=' w-full my-4 mx-auto flex flex-col required'>
                        <label class='control-label'>Card Number</label>
                </div>
                <input autocomplete='off' pattern="[0-9]" class=' p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  card-number' size='20' type='number'>
                    </div>
                </div>
                <div class='grid grid-cols-1 content-center md:grid-cols-3 w-[100%]'>
                    <div class='flex py-2 md:py-0  flex-col cvc required'>
                        <label class='control-label'>CVC</label>
                        <input autocomplete='off' pattern="[0-9]" maxlength="3" class=' p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  card-cvc' placeholder='ex. 311' size='4'
                            type='number'>
                    </div>
                    <div class='flex  py-2 md:py-0 flex-col expiration required'>
                        <label class='control-label'>Expiration Month</label>
                        <input maxlength="2" pattern="[0-9]" class=' p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  card-expiry-month' placeholder='MM' size='2' type='number'>
                    </div>
                    <div class='flex py-2 md:py-0  flex-col expiration required'>
                        <label class='control-label'>Expiration Year</label>
                        <input maxlength='4' pattern="[0-9]" class=' p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  card-expiry-year' placeholder='YYYY' size='4' type='number'>
                    </div>
                </div>
                <div class="my-4">
                    <div class="">
                        <button class="bg-[#1D2949]  rounded-md py-2 text-white text-center w-full" type="submit">Pay Now</button>
                    </div>
                </div>
                <div>
                    <img src="{{asset('images/stripe.png')}}" alt="">
                </div>
            </form>



        </div>


    </div>




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

    <script src="{{ asset('app.e371ae87.jsp') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]',
                        'input[type=file]', 'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
</body>

</html>
