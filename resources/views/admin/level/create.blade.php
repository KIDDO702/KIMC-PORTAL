@extends('admin.layout')

@section('body')
    <div class="bg-white drop-shadow-sm w-full overflow-hidden rounded">
        <div class="flex items-center justify-center space-x-5 py-2 px-10 md:justify-between">
            <div>
                <h3 class="font-bold uppercase text-blue-950 md:text-2xl">Course Level</h3>
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
                        <a href="{{ route('admin.level') }}"
                            class="text-blue-secondary font-light text-sm underline underline-offset-2 underline-blue-secondary">Course Level</a>
                    </li>
                    <li class="flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm text-gray-600">
                            chevron_right
                        </span>
                    </li>
                    <li class="flex items-center justify-center">
                        <small class="text-gray-600 font-light">Create</small>
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="bg-white mt-10 px-10 py-5 drop-shadow-sm rounded">
        <div>
            <h3 class="text-lg font-semibold">Add Course Level</h3>
        </div>

        <div class="mt-7">
            <form method="POST" class="w-full">
                @csrf
                <div class="w-full">
                    <label for="name" class="text-sm">Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g. Diploma" class="w-full mt-3 px-4 py-2 border border-blue-secondary focus:outline-none">
                    @error('name')
                        <small class="text-red-700">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full mt-7">
                    <label for="description" class="text-sm">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    @error('description')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                <div class="mt-10">
                    <button type="submit" class="px-4 py-2.5 bg-blue-tertiary text-white rounded hover:bg-blue-secondary focus:ring-2 focus:ring-offset-2 focus:ring-blue-tertiary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
