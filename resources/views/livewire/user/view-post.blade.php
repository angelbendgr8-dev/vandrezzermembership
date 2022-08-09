<div class="mx-auto w-[100%] md:w-[80%]">
    <div class=" flex flex-col lg:space-x-8 px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="w-full ">
            <div class="my-2">
                <div class="flex flex-row pb-2 justify-between border-b-2 border-[#EF7D00]">
                    <p class="text-lg font-medium  text-gray-900">
                        {{ $uploader->type === 'admin' ? 'Vandrezzer' : ($uploader->type === 'manager' ? $uploader->firstname : $uploader->display_name) }}'s
                        Post</p>

                </div>
            </div>
            <div wire:key='post'>
                @livewire('user.forum-item', ['post' => $post])


            </div>
        </div>
        <div class="mt-2">
            @forelse ($replies as $reply)
                @livewire('user.reply-item', ['reply' => $reply], key($reply->id))
            @empty


                <div class="bg-white rounded-md flex flex-col items-center px-4 md:px-8 py-4 mb-2 h-12">
                    <p>No Replies Available</p>
                </div>
            @endforelse
            {{ $replies->links() }}
        </div>
        <div wire:key='reply'>
            <div class="hidden">
                @livewire('user.add-reply', ['post' => $post->id])

            </div>
            <livewire:user.add-reply :post="$post" :wire:key="1">
        </div>

    </div>
</div>
