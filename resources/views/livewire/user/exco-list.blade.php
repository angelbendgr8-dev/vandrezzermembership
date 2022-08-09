<div class="mx-auto w-[100%] md:w-[80%]">
    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="my-2">
            <div class="flex flex-row justify-between border-b-2 border-[#EF7D00]">
                <p class="text-lg font-medium  text-gray-900">Exco List</p>

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
                                Position
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $manager->firstname }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $manager->lastname }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $manager->email }}
                            </td>
                            <td class="py-4 px-6">
                                {{ 'President' }}
                            </td>
                        </tr>
                        @forelse ($excos as $exco)
                           @livewire('component.club-exco', ['exco' => $exco], key($exco->id))
                        @empty
                            <tr>
                                <td colspan="6" class="bg-white">
                                    <p class="text-center my-2">there are no excos registered</p>
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>

            </div>

        </div>



    </div>



</div>
