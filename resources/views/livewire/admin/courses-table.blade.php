<div>
    <div class="w-full flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <select id="perPage"
                class="bg-gray-50 mt-2 px-4 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-secondary block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{-- <option selected>Per Page</option> --}}
                <option value="10">10</option>
                <option value="20">25</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="flex items-center space-x-3">
            <select id="perPage" wire:model="selectedDepartment"
                class="bg-gray-50 mt-2 px-4 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-secondary block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>All Departments</option>
                @foreach ($departments as $departmentId => $departmentName)
                    <option value="{{ $departmentId }}">{{ $departmentName }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center space-x-3">
            <select id="perPage" wire:model="selectedDepartment"
                class="bg-gray-50 mt-2 px-4 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-secondary block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>All Course Levels</option>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <input type="text" placeholder="Search"
                class="border border-blue-secondary px-4 py-1.5 rounded-md placeholder:text-sm">
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
                        Code
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Name
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Department
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Level
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Period
                    </th>
                    <th scope="col" class="py-3 pr-3">
                        Date Added
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
                @foreach ($courses as $course)
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
                        {{ $course->code }}
                    </td>
                    <td class="py-3 pr-3">
                        {{ $course->name }}
                    </td>
                    <td class="py-3 pr-3">
                        {{ $course->department->name }}
                    </td>
                    <td class="py-3 pr-3">
                        {{ $course->level->name }}
                    </td>
                    <td>
                        {{ $course->period }}
                    </td>
                    <td class="py-3 pr-3">
                        <h2 class="text-sm font-semibold text-gray-700">
                            {{ $course->created_at->toFormattedDateString() }}
                        </h2>
                        <small class="text-gray-700">
                            {{ $course->created_at->diffForHumans() }}
                        </small>
                    </td>
                    <td class="py-3 pr-3">
                        <a href="{{ route('course.edit', $course->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </a>
                        <a wire:click="deleteCourse('{{ $course->id }}')"
                            onclick="return confirm('Are you sure you want to delete this course?')"
                            class="cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline">
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
</div>
