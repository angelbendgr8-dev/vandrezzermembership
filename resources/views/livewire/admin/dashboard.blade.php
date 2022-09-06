<div class="mx-auto w-[100%] md:w-[80%]">
    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="my-2">
            <div  class=" flex flex-col md:flex-row justify-center items-center md:justify-between border-b-2 border-[#EF7D00]">
                <p class="text-lg font-medium  text-gray-900">Club Manager List</p>
                <div class="flex flex-row items-center">
                    <p class="px-2">Filter <span class="mdi mdi-filter-variant"></span></p>
                    <input wire:model='search'
                        class="my-2  p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300"
                        type="text">
                    <a href="#" wire:click='export' class="px-4 py-2 rounded-md bg-[#1D2949] text-white ">Export</a>
                </div>
            </div>
        </div>
        <div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="py-3 px-6">
                                Firstname
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Secondname
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Email
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Mobile Number
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6">
                                club name

                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($managers as $manager)
                            @livewire('admin.club-manager', ['manager' => $manager], key($manager->id))
                        @empty
                            <tr>
                                <td class="flex items-center col-span-6">
                                    <p>there are no managers register</p>
                            </tr>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
                <div class="my-4">
                    {{ $managers->links() }}

                </div>
            </div>

        </div>



    </div>



</div>
