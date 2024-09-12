@extends('components.body')

@section('title', 'Scheduling System with Automated Conflict Resolver')

@section('body')
    <form action="" method="post" name="profileForm" id="profile-form" class="profile-page p-4 md:p-8">
        @csrf
        @method('post')
        
        {{-- Profile Picture Section  --}}
        <div class="flex flex-col items-center md:flex-row md:items-center md:ml-8 md:mt-8">
            <div class="relative w-32 h-32 md:w-40 md:h-40 bg-[#223a5e] border-4 rounded-full overflow-hidden flex items-center justify-center">
                <img src="" alt="User Profile" class="w-full h-full object-cover">
                <input type="file" id="profile-pic-upload" class="absolute inset-0 opacity-0 cursor-pointer">
            </div>
            <div class="mt-4 md:mt-0 md:ml-4 flex flex-col items-center md:items-start">
                <label for="profile-pic-upload" class="cursor-pointer text-blue-500 mb-2">Change Profile Picture</label>
                <h2 class="font-normal text-center md:text-left">Personal Profile</h2>
            </div>
        </div>

        {{-- Credentials Section  --}}
        <div class="credentials mt-6 gap-4 md:gap-6 grid grid-cols-1 md:grid-cols-4">
            <input type="text" placeholder="Full name" name="profileName" id="profile-name" class="p-2 bg-zinc-300 rounded-sm w-full">
            <input type="text" placeholder="Middle name" name="middleName" id="middle-name" class="p-2 bg-zinc-300 rounded-sm w-full">
            <input type="text" placeholder="Last name" name="lastName" id="last-name" class="p-2 bg-zinc-300 rounded-sm w-full">
            <input type="text" placeholder="Extension name" name="extensionName" id="extension-name" class="p-2 bg-zinc-300 rounded-sm w-full">
            <input type="email" placeholder="Email" name="profileEmail" id="profile-email" class="p-2 bg-zinc-300 rounded-sm w-full">
            <input type="password" placeholder="Password" name="profilePassword" id="profile-password" class="p-2 bg-zinc-300 rounded-sm w-full">
            <input type="password" placeholder="New Password" name="profileNewPass" id="profile-new-pass" class="p-2 bg-zinc-300 rounded-sm w-full">
        </div>

        {{-- Update Profile Button --}}
        <div class="flex items-center justify-center md:justify-end mt-8 md:mt-14 p-4">
            <button class="bg-[#223a5e] text-white p-2 w-full md:w-40 rounded-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Profile</button>
        </div>
    </form>
@endsection
