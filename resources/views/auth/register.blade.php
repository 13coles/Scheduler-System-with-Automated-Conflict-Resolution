<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles.css">
    <title>Account Register</title>
</head>
<body>
    <main class="flex flex-col items-center justify-center h-screen w-screen bg-gray-100 p-4">
        <!-- Registration container -->
        <div class="w-full max-w-md md:max-w-lg p-4 border-2 bg-white rounded-lg shadow-md">
            <h1 class="text-center font-bold text-2xl font-serif mb-4">Register a New Faculty Teacher</h1>
            <form class="space-y-4">
                <!-- Email field -->
                <div class="mb-3">
                    <label for="email" class="form-label font-medium">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email@example.com">
                </div>
                <!-- First name field -->
                <div class="mb-3">
                    <label for="first-name" class="form-label font-medium">First Name</label>
                    <input type="text" class="form-control" id="first-name" name="firstName">
                </div>
                <!-- Last name field -->
                <div class="mb-3">
                    <label for="last-name" class="form-label font-medium">Last Name</label>
                    <input type="text" class="form-control" id="last-name" name="lastName">
                </div>
                <!-- Password field -->
                <div class="mb-3">
                    <label for="password" class="form-label font-medium">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="characters [a-zZ-a], [0-9]">
                </div>
                <!-- Confirmation field -->
                <div class="mb-3">
                    <label for="confirm-password" class="form-label font-medium">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="re-type your password">
                </div>
                <!-- Register button -->
                <button type="submit" class="btn bg-blue-500 text-white w-full p-2 hover:bg-blue-400">Register</button>
                <a href="">Login with an Existing Account</a>
            </form>
        </div>
    </main>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
