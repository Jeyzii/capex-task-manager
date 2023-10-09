@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow-lg">

        <a href="{{ route('tasks') }}" class="text-blue-500 block mb-4 text-right">Back</a>
        <h2 class="text-2xl font-semibold mb-4 text-center">Task Details</h2>


        <div class="mb-4">
            <p class="text-gray-700 text-sm font-bold mb-2">Title</p>
            <p class="text-gray-800 mb-4">{{ $task->title }}</p>
        
            <p class="text-gray-700 text-sm font-bold mb-2">Description</p>
            <p class="text-gray-800 mb-4">{{ $task->description }}</p>
        
            <p class="text-gray-700 text-sm font-bold mb-2">Made by:</p>
            <p class="text-gray-800">{{ $task->user->name }}</p>
        </div>
        
        <div class="flex justify-between"> 

            <a href="{{ route('edit-task', ['id' => $task->id]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-full font-bold hover:bg-blue-700 focus:outline-none focus:shadow-outline">Edit Task</a>

            <form action="{{ route('delete-task', ['id' => $task->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-full font-bold hover:bg-red-700 focus:outline-none focus:shadow-outline">Delete Task</button>
            </form>
        </div>
    </div>
@endsection
