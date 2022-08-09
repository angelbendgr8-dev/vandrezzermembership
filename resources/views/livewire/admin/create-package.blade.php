<div class="mx-auto w-[100%] md:w-[40%]">
    <div class="   shadow-xl bg-white my-8 py-4">
        <p class="text-lg font-bold text-center px-32 my-2 text-gray-900">Create Package</p>
        <p class="text-md text-center px-4 md:px-16 lg:px-32 my-8 text-gray-900">Create plans for new membership agents</p>
        <div class="">
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
            <div class="self-center mb-4 w-full">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">Package Name</label>
                    <input wire:model='name' placeholder='Package name' type='name'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 @error('name') border-red-300 @enderror ' />

                </div>
                @error('name')
                    <span class="error text-red-600 my-2 float-right mr-14">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center mb-4  w-full  clear-right ">
                <div class="flex flex-row justify-center items-start space-x-6 ">
                    <label for="" class="w-[20%] ">Location</label>
                    <select wire:model='locale'
                        class='w-[60%] p-2  me-1 bg-white rounded-md focus:border-[#EF7D00] focus:ring-0 duration-300 border-2  border-gray-300'>
                        
                            <option >local</option>
                            <option>foreign</option>

                    </select>

                </div>
                @error('locale')
                    <div class="error text-red-600 float-right mr-14">{{ $message }}</div>
                @enderror
            </div>
            <div class="self-center mb-4 w-full clear-right">
                <div class="flex flex-row justify-center items-center space-x-7">
                    <label for="" class="w-[20%]">Package Price</label>
                    <input wire:model='price' placeholder='Package price' type='text'
                        class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2   border-gray-300 @error('price') border-red-300 @enderror ' />

                </div>
                @error('price')
                    <span class="error text-red-600 my-2 float-right mr-14">{{ $message }}</span>
                @enderror

            </div>

            <div class="self-center mb-4 w-full clear-right">

                <div class="flex justify-center">

                    <a href='#' wire:click='createPackage'
                        class="bg-[#1D2949] w-[20%] rounded-md py-2 text-white text-center">
                        <div wire:loading wire:target='createPackage' class=" mdi mdi-loading animate-spin"></div>
                        <span wire:loading.remove wire:target='createPackage'>Create</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
