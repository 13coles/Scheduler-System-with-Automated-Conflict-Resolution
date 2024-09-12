<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @yield('head')
</head>
<body class="flex justify-center h-screen overflow-hidden">
    @include('components.sidebar')

    <main class="w-screen">
        <!-- Head Elements -->
        {{-- For big screens --}}
        <span class="hidden md:block">
            <div class="flex items-center justify-between bg-[#223a5e] p-6 md:ml-64 md:w-screen-2xl">
                <div class="school-name flex items-center justify-between gap-2">
                    <span>
                        <img src="../images/th.jfif" alt="DepEd logo" width="70" height="70">
                    </span>
                    <h1 class="font-bold md:text-2xl font-serif text-neutral-100">Sagay City National High School - Stand Alone</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative inline-block">
                        <i class="fas fa-bell text-xl text-white"></i>
                        <span class="absolute top-0 right-0 block w-3 h-3 bg-red-500 text-white text-xs font-bold rounded-full text-center">0</span>
                    </div>
                    <div class="relative group mr-20">
                        <button class="flex items-center space-x-2 p-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547" alt="Avatar" class="w-10 h-10 rounded-full">
                            <span class="font-semibold">Admin</span>
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg hidden group-hover:block z-50">
                            <div class="p-2">
                                <a href="{{ route('pages.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                                <button class="flex items-center px-4 py-2 text-red-600 hover:bg-red-100 w-full text-left">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout
                                </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </span>

        {{-- For mobile screen --}}
        <span class="block md:hidden">
            <div class="flex items-center justify-end bg-[#223a5e] p-4">
                <div class="flex items-center space-x-4">
                    <div class="relative inline-block">
                        <i class="fas fa-bell text-xl text-white"></i>
                        <span class="absolute top-0 right-0 block w-3 h-3 bg-red-500 text-white text-xs font-bold rounded-full text-center">0</span>
                    </div>
                    <div class="relative group">
                        <button class="flex items-center space-x-2 p-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547" alt="Avatar" class="w-10 h-10 rounded-full">
                            <span class="font-semibold hidden">Admin</span>
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg hidden group-hover:block z-50">
                            <div class="p-2">
                                <a href="{{ route('pages.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                                <button class="flex items-center px-4 py-2 text-red-600 hover:bg-red-100 w-full text-left">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </span>


        <div class="tables w-screen-2xl h-screen md:ml-64 bg-neutral-50 p-6 shadow-lg relative">
            @yield('body') 

        </div>
    </main>

    

    {{-- Tailwind and bootstrap scripts--}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    @yield('scripts')
    
</body>
</html>
