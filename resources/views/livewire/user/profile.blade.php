<div class="mx-auto w-[100%] md:w-[50%]">
    <div class="   shadow-xl bg-white pt-4 pb-16 mt-4">
        @livewire('user.profile-upload', ['user' => $user], key($user->id))
        <div class="">
            <div class="self-center mb-4 w-full">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">First Name</label>
                    <input wire:model='user.firstname' placeholder='First Name' type='text'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 @error('firstname') border-red-300 @enderror ' />

                </div>
                @error('user.firstname')
                    <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">Last Name</label>
                    <input wire:model='user.lastname' placeholder='Last Name' type='text'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('lastname') border-red-300 @enderror ' />

                </div>
                @error('user.lastname')
                    <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="email" class="w-[20%]">Email Address</label>
                    <input wire:model='user.email' disabled placeholder='Email address' type='email'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('email') border-red-300 @enderror ' />

                </div>
                @error('email')
                    <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="email" class="w-[20%]">Display Name</label>
                    <input wire:model='user.display_name' placeholder='Display Name' type='text'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('email') border-red-300 @enderror ' />

                </div>
                @error('display_name')
                    <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                @enderror

            </div>

            <div class="self-center mb-4 w-full clear-right">

                <div class="flex justify-center">

                    <a href='#' wire:click='updateProfile'
                        class="bg-[#1D2949] w-[20%] rounded-md py-2 text-white text-center">
                        <div wire:loading wire:target='updateProfile' class=" mdi mdi-loading animate-spin"></div>
                        <span wire:loading.remove wire:target='updateProfile'>Update</span>
                    </a>

                </div>
            </div>



        </div>


    </div>



</div>
