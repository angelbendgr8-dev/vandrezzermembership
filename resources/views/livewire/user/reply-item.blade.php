<div class="bg-white rounded-md flex flex-col md:flex-row space-x-6 px-4 md:px-8 py-4 mb-2 ">
    <div class="flex flex-row md:flex-col justify-start items-center ">
        <div class="h-16 w-16 sm:h-16 sm:w-16 flex justify-center items-center rounded-full">
            @if ($uploader->type === 'admin')

                <img src="{{ asset('images/logo.png') }}" class="" alt="">
            @elseif($uploader->type === 'manager')
                @if ($uploader->profile_pics)
                    <img class='rounded-full h-16 w-32'  src="{{ asset('/storage/' . $uploader->profile_pics) }}" alt="">
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
    <div class="flex flex-col justify-between">
        <div class="border-b w-full border-gray-300 pb-4">

            <div class="flex flex-col justify-start items-start ">

                <p class="text-gray-800 ml-2">{{ $reply->comment }}</p>

            </div>
        </div>
        <div class=" pb-4">
            <p class="text-gray-400"> <span class="mdi mdi-clock"></span> posted on:
                {{ \Carbon\Carbon::parse($reply->created_at)->format('d M') }} @
                {{ \Carbon\Carbon::parse($reply->created_at)->format('H:i a') }}</p>
        </div>

    </div>

</div>
