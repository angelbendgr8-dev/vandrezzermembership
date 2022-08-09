<div class="mx-auto w-[100%] md:w-[80%]">
    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div>
            <div class="border-b-2 border-[#EF7D00]">
                <p class="text-lg font-medium  text-gray-900">Branch (Profile)</p>

            </div>
        </div>
        {{-- <div wire:ignore class="grid  grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-5 justify-evenly">
            @livewire('component.membership-type', ['name' => 'junior', 'age_range' => '17 & under', 'price' => '(free)'], key('junior'))
            @livewire('component.membership-type', ['name' => 'young Adult', 'age_range' => '18-21', 'price' => '(₦10)'], key('junior'))
            @livewire('component.membership-type', ['name' => 'Adult', 'age_range' => '22-59', 'price' => '(₦20)'], key('junior'))
            @livewire('component.membership-type', ['name' => 'Senior', 'age_range' => '60+', 'price' => '(₦30)'], key('junior'))
            @livewire('component.membership-type', ['name' => 'Life Member', 'price' => '(free)'], key('junior'))
            @livewire('component.membership-type', ['name' => 'Grand Total'], key('junior'))
        </div> --}}
        <div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="py-3 px-6">
                                First name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Last name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Email
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Display Name
                            </th>

                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            @livewire('dashboard.user-item', ['user' => $user], key($user->id))
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
        <div class="border-b-2 border-[#EF7D00]">
            <p class="text-lg font-medium  text-gray-900">Member Search</p>

        </div>
        <div class="bg-white px-4 py-4">
            <div class="self-center mb-4 w-full">
                <div class="flex flex-col  justify-center items-start space-y-3 ">
                    <label for=""></label>
                    <input wire:model='search' placeholder='' type='text'
                        class='w-full my-2  p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

                </div>
                @error('search')
                    <span class="error text-red-600 float-right">{{ $message }}</span>
                @enderror

            </div>


            <div class="self-center mb-4 w-full">

                <div class="flex justify-center">

                    <div wire:loading class="bg-[#1D2949] text-white w-[20%] rounded-md py-2 text-center">
                        <div wire:loading  class=" mdi mdi-loading animate-spin"></div>
                        <span  >Search</span>
                    </div>

                </div>
            </div>



        </div>


    </div>



</div>
