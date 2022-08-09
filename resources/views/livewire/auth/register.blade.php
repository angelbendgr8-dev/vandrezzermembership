<div class="mx-auto w-[100%] md:w-[50%]">
    <div class="   shadow-xl bg-white pt-4 pb-16 mt-4">
        <p class="text-md text-center px-8 my-8 text-gray-900">Welcome to Vandrezzer FC Supporters Club
           <span class='text-[#1D2949] text-[18px] font-bold'> {{ $club->name }}</span> . If you already have an
            account <a href="{{ route('branch.login') }}" class="text-orange-400"> click here</a> to continue.</p>
        <div class="">
            <div class="self-center mb-4 w-full">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">First Name</label>
                    <input wire:model='firstname' placeholder='First Name' type='text'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 @error('firstname') border-red-300 @enderror ' />

                </div>
                @error('firstname')
                    <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">Last Name</label>
                    <input wire:model='lastname' placeholder='Last Name' type='text'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('lastname') border-red-300 @enderror ' />

                </div>
                @error('lastname')
                    <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="email" class="w-[20%]">Email Address</label>
                    <input wire:model='email' placeholder='Email address' type='email'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('email') border-red-300 @enderror ' />

                </div>
                @error('email')
                    <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right ">
                <div class="flex flex-row justify-center items-start space-x-6 ">
                    <label for="" class="w-[20%] ">Mobile Number</label>
                    <input wire:model='mobile_number' placeholder='Mobile number' type='text'
                        class='w-[60%] p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

                </div>
                @error('mobile_number')
                    <span class="error text-red-600 float-right">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="password" class="w-[20%]">Password</label>
                    <input wire:model='password' placeholder='Password' type='password'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('password') border-red-300 @enderror ' />

                </div>
                @error('password')
                    <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">confirm Password</label>
                    <input wire:model='password_confirmation' placeholder='confirm Password' type='password'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('password_confirmation') border-red-300 @enderror ' />

                </div>
                @error('password_confirmation')
                    <span class="error text-red-600 float-right">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full">

                <div class="flex justify-center">

                    <a href='#' wire:click='joinClub'
                        class="bg-[#1D2949] w-[20%] rounded-md py-2 text-white text-center">
                        <div wire:loading wire:target='joinClub' class=" mdi mdi-loading animate-spin"></div>
                        <span wire:loading.remove wire:target='joinClub'>Submit</span>
                    </a>

                </div>
            </div>
        </div>


    </div>



</div>
