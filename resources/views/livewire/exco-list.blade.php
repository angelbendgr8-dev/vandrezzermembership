<div class="mx-auto w-[100%] md:w-[80%]">
    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="my-2">
            <div class="flex flex-row justify-between border-b-2 border-[#EF7D00]">
                <p class="text-lg font-medium  text-gray-900">Exco List</p>
                <a href="{{route('branch.add.exco')}}" data-tooltip-target="tooltip-default" type="button" class="w-8 h-8 flex items-center justify-center text-white rounded-full bg-[#1D2949]"><span class="mdi mdi-plus"></span></a>
                <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                    Tooltip content
                    <div class="tooltip-arrow" data-popper-arrow></div>
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
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
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
                            <td></td>
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
