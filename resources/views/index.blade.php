@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow-lg">
    <div class="flex justify-between mb-4">
        <h2 class="text-2xl font-semibold text-center">List of Tasks</h2>
        <a href="{{ route('create-task') }}" class="bg-blue-500 text-white px-4 py-2 rounded-full font-bold hover:bg-blue-700 focus:outline-none focus:shadow-outline">Create</a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <ul class="text-center">
        @forelse ($tasks as $task)
            <li class="flex items-center justify-between mb-2 p-2 bg-gray-200 rounded">
                <a href="{{ route('show-task', ['id' => $task->id]) }}" class="flex-1">{{ $task->title }}</a>
            </li>
        @empty
            <h2 class="text-2xl font-semibold text-center">No tasks added.</h2>
        @endforelse
    </ul>        
</div>
@endsection
