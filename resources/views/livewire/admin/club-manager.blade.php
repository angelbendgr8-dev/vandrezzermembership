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
        {{ $manager->status }}
    </td>
    <td class="py-4 px-6">
       {{$manager->club->name?? null}}
    </td>
    <td class="flex items-center py-4 px-6 space-x-3">
        
        <a href="{{ route('admin.viewinfo', $manager->id) }}"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline bg-gray-200 h-8 flex items-center justify-center w-8 rounded-full"><span
                class="mdi mdi-information-outline"></span></a>
        <a href="{{ route('admin.viewusers', $manager->id) }}"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline bg-gray-200 h-8 flex items-center justify-center w-8 rounded-full"><span
                class="mdi mdi-account-multiple"></span></a>
        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover: bg-gray-200 h-8 flex items-center justify-center w-8 rounded-full"><span class="mdi mdi-delete"></span></a>
    </td>
</tr>
