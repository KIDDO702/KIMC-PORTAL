@extends('admin.layout')

@section('body')
    <div class="bg-white drop-shadow-sm w-full rounded">
        <div class="flex items-center justify-between py-2 px-8">
            <div>
                <h3 class="font-bold uppercase text-blue-950 text-2xl">Courses</h3>
            </div>
            <div>
                <ol class="flex items-center space-x-3">
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
                        <small class="text-gray-600 font-light">Courses</small>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="bg-white py-4 px-10 mt-10 drop-shadow-sm rounded w-full">
        <div class="flex justify-between items-center">
            <div class="">
                <h3 class="font-semibold text-lg">
                    All Courses
                </h3>
            </div>
            <div>
                <a href="{{ route('course.create') }}"
                    class="px-3 py-1.5 rounded flex items-center justify-center text-white bg-blue-secondary hover:bg-blue-primary">
                    <span class="material-symbols-outlined mr-1.5 text-sm">
                        add
                    </span>
                    <span>
                        Add New
                    </span>
                </a>
            </div>
        </div>

        <hr class="border-gray-200 my-7">
        <div class="">

        </div>
    </div>
@endsection
