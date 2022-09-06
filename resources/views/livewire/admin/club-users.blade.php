<div class="mx-auto w-[100%] md:w-[80%]">
    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="my-2">
            <div class="flex flex-row justify-between border-b-2 border-[#EF7D00]">
                <p class="text-lg font-medium  text-gray-900">{{$club->name?? ''}} Users List</p>
                <a href="#" wire:click='export' class="px-4 py-2 rounded-md bg-[#1D2949] text-white ">Export</a>
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
                                Display Name
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                           @livewire('admin.users', ['user' => $user], key($user->id))
                        @empty
                            <tr>
                                <td colspan="6" class="bg-white">
                                    <p class="text-center my-2">there are no users registered</p>
                                </td>
                            </tr>
                        @endforelse

                        
                    </tbody>
                </table>

            </div>

        </div>



    </div>



</div>
