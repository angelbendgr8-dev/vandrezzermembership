<div class="mx-auto w-[100%] md:w-[50%]">
    <div class="   shadow-xl bg-white my-8 py-4">
        <p class="text-lg font-bold text-center px-32 my-2 text-gray-900">Login</p>
        <p class="text-md text-center px-4 md:px-16 lg:px-32 my-8 text-gray-900">Please enter your email and password to
            login. </p>
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
        <form wire:submit.prevent="Activate">
            <div class="self-center mb-4  w-full  clear-right ">
                <div class="flex flex-row justify-center items-start space-x-6 ">
                    <label for="" class="w-[20%] ">Package</label>
                    <select wire:model='package'
                        class='w-[60%] p-2  me-1 bg-white rounded-md focus:border-[#EF7D00] focus:ring-0 duration-300 border-2  border-gray-300'>
                        <option selected> Package</option>

                        @foreach ($packages as  $package)
                            <option value="{{ $package->id }}">{{ $package->name }}</option>
                        @endforeach
                    </select>

                </div>
                @error('package')
                    <div class="error text-red-600 float-right mr-16">{{ $message }}</div>
                @enderror
            </div>

            <div class="self-center mb-4 w-full clear-right">

                <div class="flex justify-center">

                    <button type="submit"  id="checkout-button"
                        class="bg-[#1D2949] w-[20%] rounded-md py-2 text-white text-center">
                        <div wire:loading wire:target='Activate' class=" mdi mdi-loading animate-spin"></div>
                        <span wire:loading.remove wire:target='Activate'>Activate</span>
                    </a>
                </div>
            </div>

        </form>
        </div>
    </div>
</div>
