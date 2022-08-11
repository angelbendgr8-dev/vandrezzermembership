<div class="mx-auto w-[100%] md:w-[60%]">
    <div x-data="{ open: true }" >
        @if (session()->has('warning'))class="flex items-center justify-center my-2"
        <div x-show='open' class="bg-orange-500 w-[80%]  md:w-[40%] rounded-sm py-2 text-center text-white">

            {{ session('warning') }}
            <button @click="open = ! open" class="float-right mr-2"><span class="mdi mdi-close-box"></span></button>

            </div>
        @endif

    </div>
    <div x-data="{ open: true }" class="flex items-center justify-center my-2">
        @if (session()->has('message'))
        <div x-show='open' class="bg-green-500 w-[80%]  md:w-[40%] rounded-sm py-2 text-center text-white">

            {{ session('message') }}
            <button @click="open = ! open" class="float-right mr-2"><span class="mdi mdi-close-box"></span></button>

            </div>
        @endif

    </div>
    <div class=" px-4  shadow-xl bg-blue-100 py-16 ">
        <div class=" mb-8">
            <div class=" flex flex-row justify-between border-b-2 border-[#EF7D00]">
                <p class="text-lg font-bold  text-gray-900">Club Details</p>

                @if (Auth::user()->status === 'inactive' && $number_of_supporters >10)
                    <div>
                        <a href='{{ route('branch.activate.account') }}'
                            class="bg-[#EF7D00]  px-6 text-white w-[20%] rounded-md py-1 text-center">

                            <span>Activate</span>
                        </a>
                    </div>
                @endif

            </div>



        </div>
        <div>
            <div class="self-center p-4 w-full border-b border-white  ">
                <div class="flex flex-row justify-center items-start space-x-6 ">
                    <label for="" class="w-[20%] hidden md:flex">Branch Unique Link</label>
                    <p class="w-[90vw] lg:w-full border-l border-white">
                        <a href="#" id="clubUrl">{{ route('user.join', $club->slug) }}</a>
                        <input class="hidden" type="text" value="{{ route('user.join', $club->slug) }}"
                            id="myInput">
                    </p>
                    <button class="bg-gray-300 text-2xl rounded-md p-2" onclick="myFunction()"><span
                            class="mdi mdi-share-variant"></span></button>

                </div>

            </div>
            <div class="self-center p-4 w-full border-b border-white  ">
                <div class="flex flex-row justify-center items-start space-x-6 ">
                    <label for="" class="w-[20%] ">Status</label>
                    <p class="w-full border-l border-white">
                        {{ Auth::user()->status }}
                    </p>


                </div>

            </div>
            <div class="self-center p-4 w-full border-t border-white ">
                <div class="flex flex-row justify-center items-start space-x-6 ">
                    <label for="" class="w-[20%] ">Branch Name</label>
                    <input wire:model='club.name' disabled placeholder='' type='text'
                        class='w-full  p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

                </div>
                @error('club.name')
                    <span class="error text-red-600 float-right">{{ $message }}</span>
                @enderror

            </div>
        </div>
        <div class="self-center p-4 w-full border-t border-white clear-right ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Country</label>
                <select wire:model='club.country'
                    class='w-full p-2 mb-5 me-1 bg-white rounded-md focus:border-[#EF7D00] focus:ring-0 duration-300 border-2  border-gray-300'>
                    <option disabled> {{ $club->country }}</option>

                    @foreach ($countries as $index => $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>

            </div>
            @error('club.country')
                <div class="error text-red-600 float-right">{{ $message }}</div>
            @enderror
        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Preffered Email Address</label>
                <input wire:model='club.club_email' placeholder='' type='email'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club.club_email')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Preffered Mobile Number</label>
                <input wire:model='club.club_mobile' placeholder='' type='text'
                    class='w-full p-2 focus:border-[#EF7D00] focus:ring-0 duration-300 rounded-md  border-2  border-gray-300 ' />

            </div>
            @error('club.club_mobile')
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
                <p class="w-full"><a href="">{{ $number_of_supporters }}</a></p>

            </div>
            @error('language')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Last member added date</label>
                <p class="w-full"><a
                        href="">{{ \Carbon\Carbon::parse($last_supporter_joined_date)->format('d-M-Y') }}</a>
                </p>

            </div>
            @error('language')
                <span class="error text-red-600 float-right">{{ $message }}</span>
            @enderror

        </div>
        <div class="self-center p-4 w-full border-t border-white ">
            <div class="flex flex-row justify-center items-start space-x-6 ">
                <label for="" class="w-[20%] ">Branch Created Date</label>
                <p class="w-full"><a
                        href="">{{ \Carbon\Carbon::parse($club->created_at)->format('d-M-Y') }}</a></p>

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

                <a href='#' wire:click='updateClubInfo'
                    class="bg-[#1D2949] text-white w-[20%] rounded-md py-2 text-center">
                    <div wire:loading wire:target='updateClubInfo' class=" mdi mdi-loading animate-spin"></div>
                    <span wire:loading.remove wire:target='updateClubInfo'>Update</span>
                </a>

            </div>
        </div>



    </div>


</div>


<script>
    function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        copyToClipboard(copyText.value).then(() => {
            console.log('copied')
        })
        // navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
    }

    function copyToClipboard(textToCopy) {
        // navigator clipboard api needs a secure context (https)
        if (navigator.clipboard && window.isSecureContext) {
            // navigator clipboard api method'
            return navigator.clipboard.writeText(textToCopy);
        } else {
            // text area method
            let textArea = document.createElement("textarea");
            textArea.value = textToCopy;
            // make the textarea out of viewport
            textArea.style.position = "fixed";
            textArea.style.left = "-999999px";
            textArea.style.top = "-999999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            return new Promise((res, rej) => {
                // here the magic happens
                document.execCommand('copy') ? res() : rej();
                textArea.remove();
            });
        }
    }
</script>
