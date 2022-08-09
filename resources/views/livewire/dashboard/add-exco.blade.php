<div class="mx-auto w-[100%] md:w-[50%]">
    <div class="   shadow-xl bg-white pt-4 pb-16 mt-4">

        <div class="self-center mb-4 w-full clear-right">
            <div  class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Select User</label>
                <select wire:model='user'
                    class='w-[60%] p-2 mb-5 me-1 bg-white rounded-md focus:border-[#EF7D00] focus:ring-0 duration-300 border-2  border-gray-300'>
                    <option selected>Select</option>
                    @foreach ($users as $user)
                    {{-- @dd($user->id) --}}
                        <option value="{{$user->id}}" >{{ $user->firstname }} {{$user->lastname}}</option>
                    @endforeach
                </select>

            </div>
            @error('user')
            <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
        @enderror
        </div>

        <div class="self-center mb-4 w-full clear-right">
            <div class="flex flex-row justify-center items-center space-x-7">
                <label for="position" class="w-[20%]">Position</label>
                <input wire:model='position' placeholder='Position' type='text'
                    class='w-[60%] p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('email') border-red-300 @enderror ' />

            </div>
            @error('position')
                <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
            @enderror

        </div>

        <div class="self-center mb-4 w-full clear-right">

            <div class="flex justify-center">

                <a href='#' wire:click='addExco'
                    class="bg-[#1D2949] w-[20%] rounded-md py-2 text-white text-center">
                    <div wire:loading wire:target='addExco' class=" mdi mdi-loading animate-spin"></div>
                    <span wire:loading.remove wire:target='addExco'>Add Exco</span>
                </a>

            </div>
        </div>



    </div>


</div>


