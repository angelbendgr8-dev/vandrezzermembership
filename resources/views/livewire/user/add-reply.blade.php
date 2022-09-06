<div class="bg-white rounded-md flex  flex-row space-x-6 px-4 md:px-8 py-4 mb-2 ">
    <div class="hidden md:flex flex-row md:flex-col justify-start items-center ">
        <div class="h-16 w-16 sm:h-16 sm:w-16 flex justify-center items-center rounded-full">
            @if (Auth::user()->type === 'admin')
                <img class='rounded-full h-16 w-32' src="{{ asset('images/logo.png') }}" class="" alt="">
            @else
                @if (Auth::user()->profile_pics)
                    <img  class='rounded-full h-16 w-32' src="{{ asset('/storage/' . Auth::user()->profile_pics) }}" alt="">
                @else
                    <span class="mdi mdi-account-circle text-3xl text-gray-400"></span>
                @endif
            @endif
        </div>
        <div></div>
        <p class="text-gray-400 ml-2">
            {{ Auth::user()->type === 'admin' ? 'Admin' : (Auth::user()->type === 'manager' ? Auth::user()->firstname : Auth::user()->display_name) }}
        </p>

    </div>
    <div class="flex  w-full flex-col ">

        <textarea autofocus wire:key="bar" wire:model.debounce.500ms='comment' placeholder="Post a reply"
            class="bg-gray-300 w-full p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('title') border-red-300 @enderror "
            name="reply" id=""></textarea>
        <div class="my-4 flex md:items-end md:justify-end">
            <a class="bg-[#1D2949] w-auto mx-auto text-white   py-2 px-6 text-center rounded-md" href="#"
                wire:click='addComment'>Post Reply</a>
        </div>


    </div>

</div>
