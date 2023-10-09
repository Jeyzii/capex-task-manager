<nav class="bg-blue-500 p-4 flex justify-between items-center">
    <div class="flex items-center">
        <a href="{{ route('tasks') }}" class="text-white font-bold mr-4">Task Lists</a>
        <a href="{{ route('create-task') }}" class="text-white mr-4">Create Task</a>
    </div>

    <div class="flex items-center">
        @if (Auth::check())
            <a class="text-white mr-4">Hi, {{ Auth::user()->name }}!</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-white" type="submit">Logout</button>
            </form>
        @else
            <a href="{{ url('/login') }}"  class="text-white mr-4">Login</a>
            <a href="{{ url('/register') }}" class="text-white">Register</a>
        @endif
    </div>    
</nav>