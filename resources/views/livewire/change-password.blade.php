<div class=" mx-auto flex flex-col self-center w-[100%] md:w-[50%]">
    <div class=" flex flex-col my-10  justify-center drop-shadow-lg   shadow-xl bg-white md:h-auto py-4">
        <p class="text-lg font-bold text-center px-32 my-2 text-gray-900">Login</p>
        <p class="text-md text-center px-4 md:px-16 lg:px-32 my-8 text-gray-900">Please enter your email and password to
            login. </p>
        <div class="" x-data="{ input: 'password' }">
            @if (session()->has('message'))
                <div x-data="{ close: false }">
                    <div x-show='!close' class="alert bg-[#F8D7DA] p-2 rounded-md flex justify-between" role="alert">

                        <p class="text-[#842029]">{{ session('message') }}</p>
                        {{-- <button @click='close = true' type="button">
                            <i class="mdi mdi-close-circle me-2"></i>
                        </button> --}}
                    </div>

                </div>
            @endif

            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">Password</label>

                        <input wire:model='password' placeholder='Password' x-bind:type="input"
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2   border-gray-300 @error('password')border-red-300 @enderror ' />


                </div>
                @error('password')
                    <span class="error text-red-600 my-2 float-right mr-14">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">Confirm Password</label>


                        <input wire:model='password_confirmation' placeholder='Password' x-bind:type="input"
                            class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2   border-gray-300 @error('password')border-red-300 @enderror ' />



                </div>
                <div class="float-right my-4">
                    <a  href="#" x-on:click="input = (input === 'password') ? 'text' : 'password'" class="mr-14 " x-text="input == 'password' ? 'Show Password' : 'Hide password'">Show password</a>

                </div>
                @error('password_confirmation')
                    <span class="error text-red-600 my-2 float-right mr-14">{{ $message }}</span>
                @enderror

            </div>


            <div class="self-center mb-4 w-full clear-right">

                <div class="flex justify-center">

                    <a href='#' wire:click='changePassword'
                        class="bg-[#1D2949] w-[80%] md:w-[20%] rounded-md py-2 text-white text-center">
                        <div wire:loading wire:target='changePassword' class=" mdi mdi-loading animate-spin"></div>
                        <span wire:loading.remove wire:target='changePassword'>Login</span>
                    </a>

                </div>
            </div>



        </div>


    </div>



</div>
