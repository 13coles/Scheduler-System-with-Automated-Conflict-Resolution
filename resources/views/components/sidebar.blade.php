<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="flex justify-center h-screen overflow-x-hidden">
        <header class="hidden md:block">
            <!-- Sidebar navigation menu -->
            <nav id="nav-bar" class="fixed top-0 left-0 h-full w-64 bg-[#fad302] flex flex-col text-white transition-all duration-200">
                <div id="nav-header" class="flex items-center justify-start p-2 min-h-[60px]">
                    <!-- System Logo -->
                    <a id="nav-title" href="{{ route('pages.home') }}">
                        <img src="{{ URL('images/depedLogo.png') }}" alt="DepEd Logo" class="ml-4" width="90" height="90">
                    </a>
                </div>
                <div id="nav-content" class="flex-1 overflow-y-auto pt-2">
                    <hr class="border-t border-gray-950">
                    <!-- Navigation menu buttons -->
                    <div class="nav-button flex items-center gap-2 py-3 pl-4 hover:bg-[#f6f6f4] transition-colors duration-200 cursor-pointer">
                        <i class="fas fa-home text-gray-950 w-6 ml-4"></i>
                        <a href="{{ route('pages.home') }}" class="text-gray-950 font-medium w-full text-left no-underline">
                            Home
                        </a> <!-- Home nav button -->
                    </div>
                    <div class="nav-button flex items-center gap-2 py-3 pl-4 hover:bg-[#f6f6f4] transition-colors duration-200 cursor-pointer">
                        <i class="fas fa-calendar-day text-gray-950 w-6 ml-4"></i>
                        <a href="{{ route('pages.schedule') }}" class="text-gray-950 font-medium w-full text-left no-underline">
                            Schedules
                        </a> <!-- Schedules nav button -->
                    </div>
                    <div class="nav-button flex items-center gap-2 py-3 pl-4 hover:bg-[#f6f6f4] transition-colors duration-200 cursor-pointer">
                        <i class="fas fa-chalkboard-teacher text-gray-950 w-6 ml-4"></i>
                        <a href="{{ route('pages.subjects') }}" class="text-gray-950 font-medium w-full text-left no-underline">
                            Subjects
                        </a> <!-- Subjects nav button -->
                    </div>
                    <hr class="border-t border-gray-950 my-2">
                    <div class="nav-button flex items-center gap-2 py-3 pl-4 hover:bg-[#f6f6f4] transition-colors duration-200 cursor-pointer">
                        <i class="fas fa-door-open text-gray-950 w-6 ml-4"></i>
                        <a href="{{ route('pages.classroom') }}" class="text-black font-medium w-full text-left no-underline">
                            Classroom
                        </a> <!-- Classrooms nav button -->
                    </div>
                    <div class="nav-button flex items-center gap-2 py-3 pl-4 hover:bg-[#f6f6f4] transition-colors duration-200 cursor-pointer">
                        <i class="fas fa-user text-gray-950 w-6 ml-4"></i>
                        <a href="{{ route('pages.teachers') }}" class="text-gray-950 font-medium w-full text-left no-underline">
                            Teachers
                        </a> <!-- Teachers nav button -->
                    </div>
                    <div class="nav-button flex items-center gap-2 py-3 pl-4 hover:bg-[#f6f6f4] transition-colors duration-200 cursor-pointer">
                        <i class="fas fa-cogs text-gray-950 w-6 ml-4"></i>
                        <a href="{{ route('pages.accounts') }}" class="text-gray-950 font-medium w-full text-left no-underline">
                            Accounts
                        </a> <!-- Profile nav button -->
                    </div>
                    <hr class="border-t border-gray-950 my-2">
                </div>
                <!-- Footer section for credits -->
                <footer id="nav-footer" class="text-center text-xs p-4 bg-gray-800">
                    <p>&copy; 2024 Sagay City National High School Stand Alone. All rights reserved.</p>
                </footer>
            </nav>
        </header>
    </body>
</html>
