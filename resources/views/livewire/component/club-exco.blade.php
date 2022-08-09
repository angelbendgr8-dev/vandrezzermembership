<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $profile->firstname }}
    </th>
    <td class="py-4 px-6">
        {{ $profile->lastname }}
    </td>
    <td class="py-4 px-6">
        {{ $profile->email }}
    </td>
    <td class="py-4 px-6">
        {{ $exco->position }}
    </td>
    @if (auth()->user()->type === 'manager')
        <td class="flex items-center py-4 px-6 space-x-3">
            <a wire:click='deleteExco' class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
        </td>
    @endif


</tr>
