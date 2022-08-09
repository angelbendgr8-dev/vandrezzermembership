<div class="mx-auto w-[100%] md:w-[50%]">
    <div class="   shadow-xl bg-white my-8 py-4">
        <p class="text-lg font-bold text-center px-32 my-2 text-gray-900">Login</p>
        <p class="text-md text-center px-4 md:px-16 lg:px-32 my-8 text-gray-900">Please enter your email and password to login. </p>
        <div class="">
            @if (session()->has('message'))
                <div x-data="{close: false}">
                    <div x-show='!close'  class="alert bg-[#F8D7DA] p-2 rounded-md flex justify-between" role="alert">

                        <p class="text-[#842029]">{{session('message')}}</p>
                        {{--  <button @click='close = true' type="button">
                            <i class="mdi mdi-close-circle me-2"></i>
                        </button>  --}}
                    </div>

                </div>
            @endif
            <div class="self-center mb-4 w-full">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">Email Address</label>
                    <input wire:model='email' placeholder='Email address' type='email'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 @error('email')border-red-300 @enderror ' />

                </div>
                @error('email')
                    <span class="error text-red-600 my-2 float-right mr-14">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]" >Password</label>
                    <input wire:model='password' placeholder='Password' type='password'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2   border-gray-300 @error('password')border-red-300 @enderror ' />

                </div>
                @error('password')
                    <span class="error text-red-600 my-2 float-right mr-14">{{ $message }}</span>
                @enderror

            </div>

            <div class="self-center mb-4 w-full clear-right">

                <div class="flex justify-center">

                    <a href='#' wire:click='Login' class="bg-[#1D2949] w-[20%] rounded-md py-2 text-white text-center">
                        <div wire:loading wire:target='Login' class=" mdi mdi-loading animate-spin"></div>
                        <span wire:loading.remove wire:target='Login' >Login</span>
                    </a>

                </div>
            </div>



        </div>


    </div>



</div>
