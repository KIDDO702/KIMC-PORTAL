<div>
    <livewire:delete-confirmation />
    <div class="w-full flex items-center justify-between">
        <div class="flex items-center justify-center space-x-2" x-data="{ perPage: @entangle('perPage') }">
            <h3>Show</h3>
            <select wire:model='perPage' class="px-2 py-1 border border-gray-300" x-model="perPage" @change="$wire.updatePerPage(perPage)">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <h3>Entries</h3>
        </div>
        <div class="flex items-center justify-center space-x-2">
            <h3>Categorize By</h3>
            <select class="px-4 py-2 border border-gray-300">
                <option value="id">Id</option>
                <option value="name">Name</option>
                <option value="type">Type</option>
                <option value="created_at">Date Added</option>
            </select>
        </div>
        <div>
            <input type="text" placeholder="Search Department" class="border border-gray-400 px-3 py-2 rounded focus:outline-none">
        </div>
    </div>

    <div class="relative shadow-md sm:rounded-lg mt-7 overflow-x-scroll">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        #
                    </th>
                    <th scope="col" class="py-3">
                        Name
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Type
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Location
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Contact (Phone / Email)
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Date Created
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($departments as $department)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="py-3 pr-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $count++ }}
                        </th>
                        <td class="py-3">
                            {{ $department->name }}
                        </td>
                        <td class="py-3 pr-3">
                            @if(!$department->type)
                                <small class="bg-green-200 text-green-900 px-2 rounded-full">Academic</small>
                            @else
                                <small class="bg-blue-200 text-customRed px-2 rounded-full">Administrative</small>
                            @endif
                        </td>
                        <td class="py-3 pr-3">
                            {{ $department->location }}
                        </td>
                        <td class="py-3 pr-3">
                            {{ $department->contact }}
                        </td>
                        <td class="py-3 pr-3">
                            <h2 class="text-sm font-semibold text-gray-700">{{ $department->created_at->toFormattedDateString() }}</h2>
                            <small class="text-gray-700">{{ $department->created_at->diffForHumans() }}</small>
                        </td>
                        <td class="flex items-center justify-center py-3 pr-3">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </a>
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5 p-5">
        {{ $departments->links() }}
    </div>
</div>