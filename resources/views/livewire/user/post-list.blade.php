<div class="w-full order-2 lg:order-1 ">
    <div class="my-2">
        <div class="flex flex-row pb-2 justify-between border-b-2 border-[#EF7D00]">
            <p class="text-lg font-medium  text-gray-900">Membership Forum</p>
            <a class="bg-[#1D2949] text-white w-24 py-2 text-center rounded-md" href="{{route('add.post')}}"><span class="mdi mdi-plus"></span>Post</a>
        </div>
    </div>

    @forelse ($posts as $post)
        @livewire('user.forum-item',['post'=>$post], key($post->id))
    @empty
        <div class="bg-white rounded-md flex flex-col items-center px-4 md:px-8 py-4 mb-2 h-12">
            <p>No Post Available</p>

        </div>
    @endforelse
    {{$posts->links()}}

</div>
