<div class="mx-auto w-[100%] md:w-[80%]">
    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="my-2">
            <div class="flex flex-row justify-between border-b-2 border-[#EF7D00]">
                <p class="text-lg font-medium  text-gray-900">Agent Payment Packages</p>
                <a href="{{route('admin.createpackages')}}" data-tooltip-target="tooltip-default" type="button" class="w-8 h-8 flex items-center justify-center text-white rounded-full bg-[#1D2949]"><span class="mdi mdi-plus"></span></a>
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
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Local
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Price
                            </th>

                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($packages as $package)
                           @livewire('admin.package-item', ['package' => $package], key($package->id))
                        @empty
                            <tr>
                                <td colspan="4" class="bg-white">
                                    <p class="text-center">there are no packages register</p>
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
                {{-- <div class="my-4">
                    {{$packages->links()}}

                </div> --}}
            </div>

        </div>



    </div>



</div>
