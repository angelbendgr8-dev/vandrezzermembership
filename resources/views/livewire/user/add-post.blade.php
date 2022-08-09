<div class="mx-auto w-[100%] md:w-[80%]">
    <div class=" flex flex-col lg:flex-row lg:space-x-8 px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="mx-auto w-full lg:w-[36%] order-1 lg:order-2  ">
            <div class="   shadow-xl bg-white mt-4 rounded-md">
                <div class="py-4 rounded-t-md bg-[#1D2949]">
                    <p class="text-center text-white">What's on your mind</p>
                </div>

                <div class=" px-4 py-2 flex flex-col justify-between ">
                    <div class="self-center mb-4 w-full clear-right">
                        <div class="flex flex-col justify-center items-start  ">
                            <label for="" class="w-[20%] ">Title </label>
                            <input wire:model='title' placeholder='Title' type='text'
                                class='w-full p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('title') border-red-300 @enderror ' />

                        </div>
                        @error('title')
                            <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="self-center mb-4 w-full clear-right">
                        <div class="flex flex-col justify-center items-start ">
                            <label for="content" class="w-[20%]">Content</label>
                            <textarea wire:model='content' placeholder='content' type='text'
                                class='w-full p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('content') border-red-300 @enderror '></textarea>

                        </div>
                        @error('content')
                            <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="self-center mb-4 w-full clear-right">
                        <div class="flex flex-col justify-center items-start  ">
                            <label for="" class="w-[20%] ">Image</label>
                            <input wire:model='photo' placeholder='Image' type='file'
                                class='w-full p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300  @error('title') border-red-300 @enderror ' />

                        </div>
                        @error('photo')
                            <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="self-center mb-4 w-full clear-right">
                        <div class="flex flex-col justify-center items-start  ">
                            <label for="" class="w-[40%] ">Audience Type</label>
                            <select wire:model='audience'
                                class='w-full p-2 mb-5 me-1 bg-white rounded-md focus:border-[#EF7D00] focus:ring-0 duration-300 border-2  border-gray-300'>
                                <option selected>Select</option>

                                <option value="public">Public</option>
                                <option value="private">Private</option>

                            </select>

                        </div>
                        @error('audience')
                            <span class="error text-red-600 float-right mr-14 my-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="self-end mb-4 w-full clear-right">
                        <div class="flex justify-center">
                            <a href='#' wire:click.prevent='addNewPost'
                                class="w-full bg-[#1D2949] rounded-md py-2 text-white text-center">
                                <div wire:loading wire:target='addNewPost' class=" mdi mdi-loading animate-spin"></div>
                                <span wire:loading.remove wire:target='addNewPost'>Add Post</span>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
