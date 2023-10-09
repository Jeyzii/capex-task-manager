<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
    <div class="max-w-md w-full p-6 bg-white rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-4 text-center">Register</h2>

        @if($errors->any())
            <div class="bg-red-200">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-full font-bold hover:bg-blue-700 focus:outline-none focus:shadow-outline">Register</button>
        </form>
        <div class="text-center mt-4">
            <p class="text-gray-800">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login here</a>.</p>
        </div>
    </div>
</body>
</html>
