<!DOCTYPE html>
<html lang="en">

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


    {{-- vite --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-blue-primary antialiased font-poppins">
    <section class="w-full py-16 px-5 md:px-3 lg:px-0">
        <div class="mx-auto md:w-[65%]">
            <div class="bg-blue-secondary drop-shadow px-4 py-2 rounded">
                <img src="{{ asset('logo-2.png') }}" alt="logo" class="mx-auto">
            </div>

            <div class="mt-10 bg-gray-light drop-shadow-md p-8 rounded">
                <div class="w-full flex justify-center">
                    <div>
                        <div class="text-center">
                            <h3 class="text-xl font-semibold uppercase">Choose your respective portal to continue</h3>
                        </div>

                        <div class="mt-7">
                            <ul class="grid md:grid-cols-2 gap-4">
                                <li class="">
                                    <a href="{{ route('admin.index') }}" class="flex items-center justify-center bg-blue-dark text-white py-2 hover:bg-blue-tertiary">
                                        <span class="material-symbols-outlined mr-1.5">
                                            shield_person
                                        </span>
                                        <span>
                                            Admin
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" class="flex items-center justify-center bg-blue-dark text-white py-2 hover:bg-blue-tertiary">
                                        <i class="fa-solid fa-chalkboard-user mr-1.5"></i>
                                        <span>
                                            Staff
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" class="flex items-center justify-center bg-blue-dark text-white py-2 hover:bg-blue-tertiary">
                                       <span class="material-symbols-outlined mr-1.5">
                                        school
                                    </span>
                                        <span>
                                            Student
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <form action="/logout" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center justify-center bg-blue-dark text-white py-2 hover:bg-blue-tertiary">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
