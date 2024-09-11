<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <!-- Login container -->
    <div class="w-full max-w-md p-4 border-2 bg-white rounded-lg shadow-md"> 
        <h1 class="text-center font-extrabold text-2xl font-serif mb-4">Login as Faculty Teacher</h1>
        <form action="{{ route('auth.login') }}" method="post" class="space-y-4">
            @csrf
            @method('post')
            <!-- Email field -->
            <div class="mb-3">
                <label for="email" class="form-label font-medium">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email@example.com">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <!-- Password field -->
            <div class="mb-3">
                <label for="password" class="form-label font-medium">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="characters [a-zZ-a], [0-9]">
            </div>
            <!-- Login button -->
            <button type="submit" class="btn bg-blue-500 text-white w-full p-2 hover:bg-blue-400">Login</button>
            <a href="">Register as New Faculty</a>
        </form>
    </div>
</body>
</html>