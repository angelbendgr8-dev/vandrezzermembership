<div class="mx-auto w-[100%] md:w-[40%]">

    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="my-2">
            <div class="flex flex-row justify-between border-b-2 border-[#EF7D00]">
                <p class="text-lg font-medium  text-gray-900" class="text-left">{{ $club->name ?? ('' ?? '') }} Club
                    Exco's
                </p>

            </div>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs bg-gray-700 uppercase text-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

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
        <div class="my-4">
            <div class="flex flex-row justify-between border-b-2 border-[#EF7D00]">
                <p class="text-lg font-medium  text-gray-900" class="text-left">{{ $club->name ?? ('' ?? '') }} Club
                    Information
                </p>
                <label wire:click="changeStatus" for="checked-toggle{{ $manager->id }}"
                    class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" value="" id="checked-toggle{{ $manager->id }}" class="sr-only peer"
                        {{ $manager->status === 'active' ? 'checked' : 'unchecked' }}>
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-[#1D2949] dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
        </div>


        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-left text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="py-3 pl-4">
                            Title
                        </th>
                        <th scope="col" class="py-3">
                            Details
                        </th>

                    </tr>
                </thead>
                <tbody class="text-left pl-4">
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Name</td>
                        <td class="text-left ml-4">
                            <p class="mx-auto"> {{ $club->name ?? '' }}</p>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Country</td>
                        <td class="text-left">
                            <p class="mx-auto">{{ $club->country ?? '' }}</p>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Email</td>
                        <td class="text-left">
                            <p class="mx-auto">{{ $club->club_email ?? '' }}</p>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Mobile</td>
                        <td class="text-left">{{ $club->club_mobile ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Website</td>
                        <td class="text-left">{{ $club->club_website ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Facebook</td>
                        <td class="text-left">{{ $club->club_facebook_link ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Instagram</td>
                        <td class="text-left">{{ $club->club_instagram_link ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Twitter</td>
                        <td class="text-left">{{ $club->club_twitter_link ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Venue</td>
                        <td class="text-left">{{ $club->club_venue ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Language</td>
                        <td class="text-left">{{ $club->club_language ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Ticket Contact Name</td>
                        <td class="text-left">{{ $club->ticket_contact_name ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Ticket Mobile Number</td>
                        <td class="text-left">{{ $club->ticket_contact_number ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Ticket Contact Email</td>
                        <td class="text-left">{{ $club->ticket_contact_email ?? '' }}</td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4">Ticket Contact Address</td>
                        <td class="text-left">{{ $club->ticket_address ?? '' }}</td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>



</div>



</div>
