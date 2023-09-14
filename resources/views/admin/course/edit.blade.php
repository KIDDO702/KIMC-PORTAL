@extends('admin.layout')

@section('body')
    <div class="bg-white drop-shadow-sm w-full overflow-hidden rounded">
        <div class="flex items-center justify-center space-x-5 py-2 px-10 md:justify-between">
            <div>
                <h3 class="font-bold uppercase text-blue-950 md:text-2xl">Courses</h3>
            </div>
            <div>
                <ol class="flex items-center space-x-0.5 md:space-x-3">
                    <li class="flex items-center justify-center">
                        <a href="{{ route('admin.index') }}"
                            class="text-blue-secondary font-light text-sm underline underline-offset-2 underline-blue-secondary">Dashboard</a>
                    </li>
                    <li class="flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm text-gray-600">
                            chevron_right
                        </span>
                    </li>
                    <li class="flex items-center justify-center">
                        <a href="{{ route('admin.course') }}"
                            class="text-blue-secondary font-light text-sm underline underline-offset-2 underline-blue-secondary">Courses</a>
                    </li>
                    <li class="flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm text-gray-600">
                            chevron_right
                        </span>
                    </li>
                    <li class="flex items-center justify-center">
                        <small class="text-gray-600 font-light">Edit</small>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="bg-white px-8 py-6 mt-16 drop-shadow-sm rounded">
        <div>
            <h3 class="text-lg font-semibold">Edit Course</h3>
        </div>

        <div class="mt-7">
            <form class="w-full" action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="w-full flex items-center space-x-5">
                    <div class="w-[50%]">
                        <label for="code" class="text-sm font-semibold">Course Code</label>
                        <input type="text" name="code" id="code" placeholder="DWG003" value="{{ $course->code }}"
                            class="w-full mt-2 px-4 py-1.5 border border-blue-secondary rounded focus:outline-2 focus:outline-offset-2 focus:outline-blue-tertiary placeholder:text-xs">
                        @error('code')
                        <small class="text-red-700">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-[50%]">
                        <label for="name" class="text-sm font-semibold">Name</label>
                        <input type="text" name="name" id="name" placeholder="Diploma in web and graphics" value="{{ $course->name }}"
                            class="w-full mt-2 px-4 py-1.5 border border-blue-secondary rounded focus:outline-2 focus:outline-offset-2 focus:outline-blue-tertiary placeholder:text-xs">
                        @error('name')
                        <small class="text-red-700">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="w-full flex items-center space-x-5 mt-7">
                    <div class="w-[50%]">
                        <label for="period" class="text-sm font-semibold">Period (In Years)</label>
                        <input type="number" name="period" id="period" placeholder="e.g. 7" value="{{ $course->period }}"
                            class="w-full mt-2 px-4 py-1.5 border border-blue-secondary rounded focus:outline-2 focus:outline-offset-2 focus:outline-blue-tertiary placeholder:text-xs">
                        @error('period')
                        <small class="text-red-700">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-[50%]">
                        <label for="location" class="text-sm font-semibold">Thumbnail</label>
                        <input type="file" name="thumbnail" class="block mt-2 w-full text-sm text-slate-500
                                                                                      file:mr-4 file:py-2 file:px-4
                                                                                      file:rounded-full file:border-0
                                                                                      file:text-sm file:font-semibold
                                                                                      file:bg-blue-50 file:text-blue-secondary
                                                                                      hover:file:bg-blue-100
                                                                                    " />
                        @error('thumbnail')
                        <small class="text-red-700 font-light">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="w-full flex items-center space-x-5 mt-7">
                    <div class="w-[50%]">
                        <label for="department" class="text-sm font-semibold">Department</label>
                        <select id="department" name="department_id"
                            class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-secondary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{-- <option selected>Departments</option> --}}
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ $course->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-[50%]">
                        <label for="level" class="text-sm font-semibold">Course Level</label>
                        <select id="level" name="level_id"
                            class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-secondary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{-- <option selected>Course Level</option> --}}
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" {{ $course->level_id == $level->id ? 'selected' : '' }}>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full mt-7">
                    <label for="level" class="text-sm font-semibold">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10">
                        {{ $course->description }}
                    </textarea>
                    @error('description')
                    <small class="text-red-700">{{$message}}</small>
                    @enderror
                </div>

                <div class="mt-7">
                    <label class="relative inline-flex items-center mr-5 cursor-pointer">
                        <input type="checkbox" value="1" class="sr-only peer mt-3" name="featured" {{ $course->featured ? 'checked'
                        : '' }}>
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer-focus:ring peer-focus:ring-blue-secondary peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Feature</span>
                    </label>
                </div>

                <div class="mt-10">
                    <button type="submit"
                        class="px-4 py-2.5 bg-blue-tertiary text-white rounded hover:bg-blue-secondary focus:ring-2 focus:ring-offset-2 focus:ring-blue-tertiary">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
