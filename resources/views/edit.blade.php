@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow-lg">
        <a href="{{ route('tasks') }}" class="text-blue-500 block mb-4 text-right">Back</a>
        <h2 class="text-2xl font-semibold mb-4 text-center">Edit Task</h2>
        
        <form action="{{ route('update-task', ['id' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" class="w-full p-2 border rounded-lg focus:outline-none focus:shadow-outline" value="{{ $task->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="w-full p-2 border rounded-lg focus:outline-none focus:shadow-outline" rows="4" required>{{ $task->description }}</textarea>
            </div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-full font-bold hover:bg-blue-700 focus:outline-none focus:shadow-outline">Save Changes</button>
        </form>
    </div>
@endsection