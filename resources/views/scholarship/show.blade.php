@extends('layouts.app')

@section('title', 'Scholarship Details')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">{{ $scholarship->name }}</h2>

    <p class="text-gray-700 mb-4">
        <strong>Description:</strong><br>
        {{ $scholarship->description ?? 'No description provided.' }}
    </p>

    <div class="flex justify-between">
        <a href="{{ route('scholarships.index') }}" class="text-blue-600 hover:underline">← Back to List</a>

        <div class="flex space-x-4">
            <a href="{{ route('scholarships.edit', $scholarship) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Edit
            </a>

            <form action="{{ route('scholarships.destroy', $scholarship) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this scholarship?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
