<div>

    <div class="my-4">
        <input wire:model='photo' type="file" class="hidden" name="" id="profile">

        <label for="profile" class="block bg-orange-200 border border-[#EF7D00] w-[100%] p-4">
            <div class="flex flex-row items-center justify-center">
                <div class="w-1/5">
                    <div class=" relative bg-white  h-16 w-16 flex justify-center items-center rounded-full">

                        @if ($user->profile_pics)
                            <div>
                                <img class='rounded-full h-16 w-32' src="{{ asset('/storage/'.$user->profile_pics)  }}" alt="">
                            </div>
                            <span
                                class="absolute -bottom-2 -right-[0.15rem] rounded-full mdi mdi-pencil text-[#1D2949] text-2xl"></span>
                        @else
                            <span class="mdi mdi-account-circle text-2xl text-gray-400"></span>
                            <span
                                class="absolute -bottom-2 -right-[0.15rem] rounded-full mdi mdi-plus-circle text-[#1D2949] text-2xl"></span>
                        @endif
                    </div>

                </div>
                <div class="w-4/5">
                    <h2 class="font-semibold text-md">Profile Photo</h2>
                    <p class="text-[12px]">
                        Your photo may be cropped so it looks great in Cityzens! You can upload a square photo to avoid
                        us
                        cropping for you.<br>
                        <span class="uppercase">(max size 2Mb)</span>
                    </p>
                    @if ($photo)
                        <a class="bg-[#1D2949] w-[20%] rounded-md py-1 px-2 text-white text-center"
                            wire:click='uploadProfilePhoto' href="#">Upload</a>
                    @endif
                </div>
            </div>
        </label>

    </div>
</div>
