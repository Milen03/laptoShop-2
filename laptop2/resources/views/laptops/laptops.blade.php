@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Лаптопи</h1>
        <p class="text-gray-600">Разгледайте нашата селекция от висококачествени лаптопи.</p>
    </div>

    <!-- Laptops Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($laptops as $laptop)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 flex flex-col">
                <img src="{{ asset('storage/' . $laptop->image) }}" 
                     alt="{{ $laptop->brand }}" 
                     class="w-full h-48 object-cover rounded mb-4">
                
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $laptop->brand }}</h2>
                <p class="text-gray-600 mb-4 flex-grow">{{ $laptop->model }}</p>
                
                <div class="mt-auto">
                    <span class="text-lg font-bold text-indigo-600">
                        {{ number_format($laptop->price, 2) }} BGN.
                    </span>
                    <a href="{{ route('laptops.show', $laptop->id) }}" 
                       class="block mt-3 bg-indigo-600 text-white text-center py-2 rounded hover:bg-indigo-700 transition">
                        Виж детайли
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
