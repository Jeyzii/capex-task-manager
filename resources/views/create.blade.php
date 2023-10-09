@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow-lg">
    <a href="{{ route('tasks') }}" class="text-blue-500 block mb-4 text-right">Back</a>

    <h2 class="text-2xl font-semibold mb-4 text-center">Add Task</h2>

    <form method="POST" action="{{ route('store-task') }}" class="mb-4">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" name="title" class="w-full p-2 border rounded-lg focus:outline-none focus:shadow-outline" placeholder="Enter task title..." required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description" class="w-full p-2 border rounded-lg focus:outline-none focus:shadow-outline" placeholder="Enter task description..." rows="4" required></textarea>
        </div>
        
        <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-full font-bold hover:bg-blue-700 focus:outline-none focus:shadow-outline">Create Task</button>
    </form>
</div>
@endsection
