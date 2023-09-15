<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kenya Institute Of Mass Communication - Home</title>

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

    <livewire:styles />


    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    {{-- vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-blue-50 antialiased font-poppins">
    <livewire:toasts />
    <section class="w-full flex overflow-x-hidden">
        <div class="bg-blue-100 border-r border-blue-300 h-screen lg:fixed lg:w-[20%]">
            <div class="hidden py-10 px-5 lg:block">
                <div class="w-full">
                    <img src="{{ asset('logo.png') }}" alt="" class="w-[43%] mx-auto bg-blue-secondary p-2 rounded drop-shadow">
                </div>

                <div class="mt-10">
                    <ul>
                        <li>
                            <small class="text-gray-500 font-light">Dashboard</small>
                        </li>
                        <li class="block py-1.5">
                            <a href="{{ route('admin.index') }}" class="flex items-center">
                                <span class="material-symbols-outlined mr-1.5 text-blue-dark">
                                    dashboard
                                </span>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="mt-3">
                            <small class="text-gray-500 font-light">Academics</small>
                        </li>
                        <li class="block py-2">
                            <a href="{{ route('admin.department') }}" class="flex items-center">
                                <span class="material-symbols-outlined mr-1.5 text-blue-dark">
                                    apartment
                                </span>
                                <span>
                                    Departments
                                </span>
                            </a>
                        </li>
                        <li class="block py-2">
                            <a href="{{ route('admin.level') }}" class="flex items-center">
                                <span class="material-symbols-outlined mr-1.5 text-blue-dark">
                                    stairs
                                </span>
                                <span>
                                    Course Level
                                </span>
                            </a>
                        </li>
                        <li class="block py-2">
                            <a href="{{ route('admin.course') }}" class="flex items-center">
                                <span class="material-symbols-outlined mr-1.5 text-blue-dark">
                                    contract
                                </span>
                                <span>
                                    Courses
                                </span>
                            </a>
                        </li>
                        <li class="block py-2">
                            <a href="{{ route('admin.unit') }}" class="flex items-center">
                                <span class="material-symbols-outlined mr-1.5 text-blue-dark">
                                    local_library
                                </span>
                                <span>
                                    Course Units
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-full lg:ml-[20%] lg:w-[80%]">
            <nav class="w-full bg-blue-100 border-b border-blue-300 fixed top-0 z-10">
                <div class="w-[90%] mx-auto flex items-center justify-between py-1.5 md:w-[95%]">
                    <div class="w-full flex justify-between lg:w-[80%]">
                        <button class="flex items-center justify-center p-2">
                            <span class="material-symbols-outlined text-2xl text-blue-dark">
                                lists
                            </span>
                        </button>
                        <ul class="flex items-center space-x-8">
                            <li class="flex items-center justify-center">
                                <a class="cursor-pointer flex items-center justify-center">
                                    <span class="material-symbols-outlined text-2xl">
                                        notifications
                                    </span>
                                </a>
                            </li>
                            <li class="flex items-center justify-center relative" x-data="{ dropDown:false }">
                                <a class="cursor-pointer flex items-center justify-center hover:text-blue-950" @click=" dropDown = !dropDown ">
                                    <span class="text-sm mr-1">{{ auth()->user()->name }}</span>
                                    <span class="material-symbols-outlined text-xs">
                                        expand_more
                                    </span>
                                </a>

                                <div class="absolute z-10 top-0 left-0 mt-10 bg-blue-100 border border-blue-200 pt-3" x-show="dropDown" x-cloak
                                    x-transition @click.outside="dropDown = false">
                                    <ul class="w-full divide-y divide-blue-300">
                                        <li class="flex justify-center w-full py-1.5">
                                            <div class="text-center">
                                                <img src="{{ auth()->user()->avatar }}" alt="profile" class="rounded-full w-[60%] mx-auto">
                                                <small class="uppercase font-semibold text-gray-800">Admin</small>
                                            </div>
                                        </li>
                                        <li class="block py-2">
                                            <a href="#" class="w-full flex justify-center items-center">
                                                <span class="material-symbols-outlined mr-1">
                                                    account_circle
                                                </span>
                                                <span>
                                                    Profile
                                                </span>
                                            </a>
                                        </li>
                                        <li class="block">
                                            <form action="/logout" method="POST" class="w-full">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full flex items-center justify-center bg-red-800 text-white px-4 py-2 hover:bg-blue-tertiary">
                                                    <span class="material-symbols-outlined mr-1.5">
                                                        logout
                                                    </span>
                                                    <span>
                                                        logout
                                                    </span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                    </div>
                </div>
            </nav>

            <div class="p-10 mt-16">
                @yield('body')
            </div>

            @php
                $year = date('Y');
            @endphp

            <div class="bg-blue-100 border-t border-blue-300 py-3 flex items-center justify-center">
                <h3 class="text-blue-dark font-semibold uppercase text-center">Copyright &copy; {{ $year }} Kenya Institute Of Mass Communication</h3>
            </div>
        </div>
    </section>
    @yield('script')
    @livewireScriptConfig
</body>
</html>
