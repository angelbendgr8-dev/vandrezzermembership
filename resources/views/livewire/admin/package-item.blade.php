<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $package->name }}
    </th>
    <td class="py-4 px-6">
        {{ $package->locale }}
    </td>
    <td class="py-4 px-6">
        {{$package->locale === 'local'? '₦':'$'}}{{ $package->price }}
    </td>

    <td class="flex items-center py-4 px-6 space-x-3">
        <a href="#" wire:click='deletePackage' class="font-medium text-red-600 dark:text-red-500 hover: bg-gray-200 h-8 flex items-center justify-center w-8 rounded-full"><span class="mdi mdi-delete"></span></a>
    </td>
</tr>
