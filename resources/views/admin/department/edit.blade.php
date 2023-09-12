@extends('admin.layout')

@section('body')
    <div class="bg-white drop-shadow-sm w-full overflow-hidden rounded">
        <div class="flex items-center justify-center space-x-5 py-2 px-10 md:justify-between">
            <div>
                <h3 class="font-bold uppercase text-blue-950 md:text-2xl">Departments</h3>
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
                        <a href="{{ route('admin.department') }}"
                            class="text-blue-secondary font-light text-sm underline underline-offset-2 underline-blue-secondary">Department</a>
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
        <div class="">
            <div>
                <h3 class="text-lg font-semibold">Edit Department</h3>
            </div>

            <div class="mt-7">
                <form class="w-full" method="POST" action="{{ route('department.update', $department->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="w-full">
                        <label for="name" class="text-gray-700 text-sm">Name</label>
                        <input type="text" value="{{ $department->name }}" id="name" name="name" placeholder="e.g. Engineering"
                            class="w-full mt-2 border border-blue-secondary px-4 py-2 rounded focus:outline-none placeholder:text-sm">
                        @error('name')
                        <small class="text-red-700 font-light">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full md:flex md:items-center mt-7 md:space-x-5">
                        <div class="md:w-[50%]">
                            <label for="location" class="text-gray-700 text-sm">Location</label>
                            <input type="text" value="{{ $department->location }}" id="location" name="location" placeholder="e.g. Enginnering Annex"
                                class="w-full mt-2 border border-blue-secondary px-4 py-2 rounded focus:outline-none placeholder:text-sm">
                            @error('location')
                            <small class="text-red-700 font-light">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-7 md:mt-0 md:w-[50%]">
                            <label for="number" class="text-gray-700 text-sm">Contact Number</label>
                            <input type="text" value="{{ $department->contact }}" id="number" name="contact"
                                placeholder="e.g. +254742134534 or enginnering@kimc.ac.ke"
                                class="w-full mt-2 border border-blue-secondary px-4 py-2 rounded focus:outline-none placeholder:text-sm">
                            @error('contact')
                            <small class="text-red-700 font-light">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:flex md:items-center mt-7 md:space-x-5">
                        <div class="md:w-[50%]">
                            <label for="type" class="text-gray-700 text-sm">Type of Department i.e. Administrative /
                                Academic</label>
                            <select id="type" name="type"
                                class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-secondary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                {{-- <option selected>Type</option> --}}
                                <option value="0" {{ $department->type ? 'selected' : '' }}>Academic</option>
                                <option value="1" {{ $department->type ? 'selected' : '' }}>Administrative</option>
                            </select>
                            @error('type')
                            <small class="text-red-700 font-light">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-7 md:mt-0 md:w-[50%] flex items-start">
                            @if ($department->thumbnail)
                                <div class="w-[50%]">
                                    <img src="{{ asset('/storage'.$department->thumbnail) }}" alt="" class="w-full">
                                </div>
                            @endif
                            <div>
                                <label for="location" class="text-gray-700 text-sm">Thumbnail</label>
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
                    </div>
                    <div class="w-full mt-7">
                        <label for="description" class="text-gray-700 text-sm">Description</label>
                        <textarea id="description" name="description" cols="30" rows="20"
                            class="w-full h-[300px] border border-blue-secondary mt-2 rounded">
                            {{ $department->description }}
                        </textarea>
                        @error('description')
                        <small class="text-red-700 font-light">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-7">
                        <label class="relative inline-flex items-center mr-5 cursor-pointer">
                            <input type="checkbox" value="1" class="sr-only peer mt-3" name="featured" {{ $department->featured ? 'checked' : '' }}>
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer-focus:ring peer-focus:ring-blue-secondary peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Feature</span>
                        </label>
                    </div>

                    <div class="mt-10">
                        <button type="submit" class="bg-blue-tertiary px-4 py-2 text-white hover:bg-blue-secondary">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
