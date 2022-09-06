<div class="bg-white  rounded-md flex flex-col md:flex-row space-x-6 px-4 md:px-4 mb-2 py-4 ">
    <div class="flex flex-row md:flex-col justify-start items-center ">
        <div class="h-16 w-16 sm:h-16 sm:w-16 flex justify-center items-center rounded-full">
            @if ($uploader->type === 'admin')

                <img src="{{ asset('images/logo.png') }}" class="" alt="">
            @elseif($uploader->type === 'manager')
                @if ($uploader->profile_pics)
                    <img class='rounded-full h-16 w-32' src="{{ asset('/storage/' . $uploader->profile_pics) }}" alt="">
                @else
                    <span class="mdi mdi-account-circle text-3xl text-gray-400"></span>
                @endif
            @else
                @if ($uploader->profile_pics)
                    <img class='rounded-full h-16 w-32' src="{{ asset('/storage/' . $uploader->profile_pics) }}" alt="">
                @else
                    <span class="mdi mdi-account-circle text-3xl text-gray-400"></span>
                @endif
            @endif
        </div>

        <p class="text-gray-400 ml-2">
            {{ $uploader->type === 'admin' ? 'VandrezzerFC' : ($uploader->type === 'manager' ? $uploaderClub : $uploader->firstname) }}
        </p>


    </div>
    <div class="flex flex-col justify-between w-full">
        <div class="border-b w-full border-gray-300 pb-4">
            <a href="{{ route('read.post', $post->id) }}" class='font-bold py-2 text-slate-700'>{{ $post->title }}</a>
            <div class="flex flex-col justify-start items-start ">
                @if ($post->image)
                    <div class="max-h-[25%] max-w-[50%]  flex justify-center items-start rounded-full">
                        <img src="{{ asset('/storage/' . $post->image) }}" alt="">
                    </div>
                @endif
                <p class="text-gray-800 ml-2">{{ $post->content }}</p>

            </div>
        </div>
        <hr class="border border-t-amber-600">
        <div class="flex flex-col md:flex-row pb-4">

            <p class="text-gray-400"> <span class="mdi mdi-clock"></span> posted on:
                {{ \Carbon\Carbon::parse($post->created_at)->format('d M') }} @
                {{ \Carbon\Carbon::parse($post->created_at)->format('H:i a') }}</p>
            <div class="flex flex-col md:flex-row ">
                <p class="text-gray-400 px-0 md:px-8 flex-row">comments<span
                        class=" mdi mdi-comment-text-multiple ml-2"></span>{{ $replies }}
                </p>
                <p><a href="{{ route('read.post', $post->id) }}"
                        class="text-gray-400  px-0 md:px-8
                transition
                duration-150
                ease-in-out ">Reply
                        <span class=" mdi mdi-reply ml-2"></span>
                    </a>
                </p>
            </div>
        </div>

    </div>

</div>
