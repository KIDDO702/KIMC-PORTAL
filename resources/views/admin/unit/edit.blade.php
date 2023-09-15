@extends('admin.layout')

@section('body')
    <div class="bg-white drop-shadow-sm w-full overflow-hidden rounded">
        <div class="flex items-center justify-center space-x-5 py-2 px-10 md:justify-between">
            <div>
                <h3 class="font-bold uppercase text-blue-950 md:text-2xl">Course Units</h3>
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
                        <a href="{{ route('admin.unit') }}"
                            class="text-blue-secondary font-light text-sm underline underline-offset-2 underline-blue-secondary">Course
                            Unit</a>
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

    <div class="bg-white mt-10 px-10 py-5 drop-shadow-sm rounded">
        <div>
            <h3 class="text-lg font-semibold">Edit Course Unit</h3>
        </div>

        <div class="mt-7">
            <form action="{{ route('unit.update', $unit->id) }}" method="POST" class="w-full">
                @method('PUT')
                @csrf
                <div class="w-full">
                    <label for="name" class="text-sm font-semibold">Name</label>
                    <input type="text" id="name" name="name" placeholder="e.g. Communication Skills" value="{{ $unit->name }}"
                        class="w-full mt-3 px-4 py-2 rounded border border-blue-secondary">
                    @error('name')
                    <small class="text-red-700">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full mt-7 flex items-center space-x-5">
                    <div class="w-[50%]">
                        <label for="code" class="text-sm font-semibold">Code</label>
                        <input type="text" id="code" name="code" placeholder="CCS01" value="{{ $unit->code }}"
                            class="w-full mt-3 px-4 py-2 rounded border border-blue-secondary">
                        @error('code')
                        <small class="text-red-700">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="w-[50%]">
                        <label for="courses" class="text-sm font-semibold">Courses</label>
                        <select name="courses[]" id="courses" multiple class="mt-5 px-4 py-2">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ $unit->course->contains($course->id) ? 'selected' : '' }}>{{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('courses')
                        <small class="text-red-700">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="w-full mt-7">
                    <label for="description" class="font-semibold text-sm">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10">
                        {{ $unit->description }}
                    </textarea>
                </div>

                <div class="mt-7">
                    <label class="font-semibold text-sm">Deselect Courses</label>
                    <ul class="mt-3">
                        @foreach ($unit->course as $selectedCourse)
                            <li class="py-2">
                                <div class="w-full flex items-center space-x-5 bg-white rounded border border-blue-200 py-2.5 px-4 drop-shadow-sm">
                                    <div>
                                        <input type="checkbox" name="deletedCourses[]" id="{{ $selectedCourse->slug }}" value="{{ $selectedCourse->id }}" class="mr-3">
                                    </div>
                                    <label for="{{ $selectedCourse->slug }}">{{ $selectedCourse->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>


                <div class="mt-10">
                    <button type="submit"
                        class="px-4 py-2.5 bg-blue-tertiary text-white rounded hover:bg-blue-secondary focus:ring-2 focus:ring-offset-2focus:ring-blue-tertiary">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('script')
    <script>
        new MultiSelectTag('courses')
    </script>
@endsection
