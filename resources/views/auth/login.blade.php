<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
    <div class="max-w-md w-full p-6 bg-white rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-4 text-center">Login</h2>

        @if($errors->any())
            <div class="bg-red-200">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-full font-bold hover:bg-blue-700 focus:outline-none focus:shadow-outline">Login</button>
        </form>

        <div class="mt-4 flex justify-center">
            <a href="{{ route('google.login') }}" class="bg-green-500 text-white px-4 py-2 rounded-full font-bold hover:bg-yellow-500">Login with Google</a>
        </div>
        <div class="text-center mt-4">
            <p class="text-gray-800">No account yet? <a href="{{ route('register') }}" class="text-blue-500">Register here</a>.</p>
        </div>
    </div>
</body>
</html>
