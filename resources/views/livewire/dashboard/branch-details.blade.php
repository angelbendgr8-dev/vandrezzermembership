<div class="mx-auto w-[100%] md:w-[60%]">
    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div class="mb-8">
            <div class="border-b-2 border-[#EF7D00]">
                <p class="text-lg font-bold  text-gray-900">Club Details</p>

            </div>

        </div>
        <div>
            <div class="self-center p-4 w-full border-b border-white  ">
                <div class="flex flex-row justify-center items-start space-x-6 ">
                    <label for="" class="w-[20%] ">Branch Unique Link</label>
                    <p class="w-full border-l border-white"><a href="">unique link here</a></p>

                </div>
                @error('firstName')
                    <span class="error text-red-600 float-right">{{ $message }}</span>
                @enderror

            </div>
            <div class="self-center p-4 w-full border-t border-white ">
                <div class="flex flex-row justify-center items-start space-x-6 ">
                    <label for="" class="w-[20%] ">Branch Name</label>
                    <input wire:model='name' placeholder='' type='text'
                        class='w-full  p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

                </div>
                @error('name')
                    <span class="error text-red-600 float-right">{{ $message }}</span>
                @enderror

            </div>
        </div>
        <div class="self-center p-4 w-full border-t border-white clear-right ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Country</label>
                <select wire:model='country'
                    class='w-full p-2 mb-5 me-1 bg-white rounded-md focus:border-[#EF7D00] focus:ring-0 duration-300 border-2  border-gray-300'>
                    <option selected> Country</option>

                    @foreach ($countries as $index => $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>

            </div>
            @error('country')
                <div class="error text-red-600 float-right">{{ $message }}</div>
            @enderror
        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Preffered Email Address</label>
                <input wire:model='club_email' placeholder='' type='email'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_email')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Preffered Mobile Number</label>
                <input wire:model='club_mobile' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_mobile')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Website</label>
                <input wire:model='club_website' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_website')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Facebook</label>
                <input wire:model='club_facebook_link' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_facebook_link')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Instagram</label>
                <input wire:model='club_instagram_link' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_instagram_link')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>

        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Twitter</label>
                <input wire:model='club_twitter_link' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_twitter_link')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Venue Address*</label>
                <input wire:model='club_venue' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_venue')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Postal Code/Zip Code*</label>
                <input wire:model='club_zip_code' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_zip_code')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Language Spoken*</label>
                <input wire:model='club_language' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club_language')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Number of supporters*</label>
                <p class="w-full"><a href="">0</a></p>

            </div>
            @error('language')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Last member added date</label>
                <p class="w-full"><a href=""></a></p>

            </div>
            @error('language')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Branch Created Date</label>
                <p class="w-full"><a href="">20/07/22</a></p>

            </div>
            @error('language')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>

        <div class="mb-8">
            <div class="border-b-2 border-[#EF7D00]">
                <p class="text-lg font-bold  text-gray-900">Tickets Delivery Address</p>

            </div>

        </div>

        <div class="self-center p-4 w-full border-b border-white ">
            <div class="flex flex-row justify-center items-start space-x-7">
                <label for="" class="w-[20%]">Contact Name</label>
                <input wire:model='ticket_contact_name' placeholder='First Name' type='contactName'
                    class='w-full p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('ticket_contact_name')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-7">
                <label for="" class="w-[20%]">Mobile Phone</label>
                <input wire:model='ticket_contact_number' placeholder='' type='text'
                    class='w-full p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('ticket_contact_phone')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-7">
                <label for="" class="w-[20%]">Email </label>
                <input wire:model='ticket_contact_email' placeholder='Email address' type='email'
                    class='w-full p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('ticket_contact_email')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-7">
                <label for="" class="w-[20%]">Address Line 1 </label>
                <input wire:model='ticket_address' placeholder='Email address' type='text'
                    class='w-full p-2  focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('ticket_address')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>

        <div class="self-center p-4 w-full border-t border-white ">

            <div class="flex justify-center">

                <a href='#' wire:click='createClub'
                    class="bg-[#1D2949] text-white w-[20%] rounded-md py-2 text-center">
                    <div wire:loading wire:target='createClub' class=" mdi mdi-loading animate-spin"></div>
                    <span wire:loading.remove wire:target='createClub'>Update</span>
                </a>

            </div>
        </div>



    </div>


</div>


