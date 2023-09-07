<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kenya Institute Of Mass Communication</title>

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

<body class="antialiased bg-blue-primary font-poppins flex items-center">
    <div class="mt-20 w-[65%] bg-gray-light mx-auto drop-shadow-md rounded flex flex-col-reverse md:flex-row">
        <div class="hidden md:block  md:w-[50%] relative h-full">
            <img src="{{ asset('img/login.jpg') }}" alt="header-1" class="rounded-l w-full h-[500px]">
            <div class="absolute inset-0 bg-blue-dark bg-opacity-40 rounded-l min-h-full"></div>
        </div>
        <div class="md:w-[50%] px-5 py-16">
            <div class="w-full">
                <img src="{{ asset('logo.png') }}" alt="logo" class="w-[20%] mx-auto">
                <div class="text-center mt-5">
                    <h3 class="font-semibold text-xl uppercase">Kenya Institute Of Mass Communication Online Portal</h3>
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}" class="w-full mt-5">
                @csrf
                <div class="w-full">
                    <input type="text" name="email" id="email" placeholder="Email or Registration Number"
                        class="w-full border border-blue-secondary px-3 py-2 rounded">
                    @error('email')
                    <small class="text-red-700 md:font-semibold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full mt-5">
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full border border-blue-secondary px-3 py-2 rounded">
                    @error('password')
                    <small class="text-red-700 md:font-semibold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-10 w-full">
                    <button type="submit"
                        class="w-full text-center bg-blue-dark hover:bg-blue-900 py-3 text-gray-light uppercase ">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
