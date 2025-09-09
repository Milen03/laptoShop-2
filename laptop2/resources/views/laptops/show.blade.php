
<!-- filepath: resources/views/laptops/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 inline-flex items-center">
                        <i class="fas fa-home w-4 h-4 mr-2"></i>
                        Начало
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 w-4 h-4"></i>
                        <a href="{{ route('laptops') }}" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Лаптопи</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 w-4 h-4"></i>
                        <span class="ml-1 text-gray-500 md:ml-2 font-medium">{{ $laptop->brand }} {{ $laptop->model }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Main Content -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                
                <!-- Left Side - Image -->
                <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 p-8 lg:p-12 flex items-center justify-center">
                    @if($laptop->image)
                        <div class="relative group">
                            <img src="{{ Storage::url($laptop->image) }}" 
                                 alt="{{ $laptop->brand }} {{ $laptop->model }}" 
                                 class="w-full max-w-lg h-auto object-cover rounded-xl shadow-2xl group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    @else
                        <div class="bg-white rounded-xl shadow-lg p-12 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-laptop text-6xl text-gray-400 mb-4"></i>
                                <p class="text-gray-500 text-lg">Няма налична снимка</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Side - Details -->
                <div class="p-8 lg:p-12 space-y-8">
                    
                    <!-- Brand Badge -->
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-blue-100 text-blue-800 font-semibold text-sm">
                        <i class="fas fa-tag mr-2"></i>
                        {{ $laptop->brand }}
                    </div>

                    <!-- Title -->
                    <div>
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            {{ $laptop->model }}
                        </h1>
                        <p class="text-xl text-gray-600 mt-2">{{ $laptop->brand }} серия</p>
                    </div>

                    <!-- Price -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 uppercase tracking-wide font-semibold">Цена</p>
                                <p class="text-4xl font-bold text-green-600">
                                    {{ number_format($laptop->price, 2) }} <span class="text-2xl">лв.</span>
                                </p>
                            </div>
                       
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <!-- <div class="flex flex-col sm:flex-row gap-4">
                        <button class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            Купи сега
                        </button>
                        <button class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-4 px-8 rounded-xl border border-gray-300 hover:border-gray-400 transition-all duration-200">
                            <i class="fas fa-heart mr-2"></i>
                            Харесай
                        </button>
                    </div> -->

                    <!-- Admin Actions -->
                    @auth
                    @if(Auth::user()->id === $laptop->user_id)
                        <div class="border-t pt-6">
                            <p class="text-sm text-gray-500 mb-4 uppercase tracking-wide font-semibold">Админски опции</p>
                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('laptops.edit', $laptop) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 rounded-lg border border-yellow-300 hover:border-yellow-400 transition-all duration-200">
                                    <i class="fas fa-edit mr-2"></i>
                                    Редактирай
                                </a>
                                <form action="{{ route('laptops.destroy', $laptop) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Сигурни ли сте, че искате да изтриете този лаптоп?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 bg-red-100 hover:bg-red-200 text-red-800 rounded-lg border border-red-300 hover:border-red-400 transition-all duration-200">
                                        <i class="fas fa-trash mr-2"></i>
                                        Изтрий
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>

        <!-- Specifications Section -->
        <div class="mt-8 bg-white rounded-2xl shadow-xl p-8 lg:p-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
                <i class="fas fa-cogs text-blue-600 mr-3"></i>
                Технически спецификации
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Processor -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-200">
                    <div class="flex items-center mb-3">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <i class="fas fa-microchip text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Процесор</h3>
                    </div>
                    <p class="text-gray-700 font-medium">{{ $laptop->processor }}</p>
                </div>

                <!-- RAM -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-200">
                    <div class="flex items-center mb-3">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-memory text-green-600 text-xl"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">RAM памет</h3>
                    </div>
                    <p class="text-gray-700 font-medium">{{ $laptop->ram }}</p>
                </div>

                <!-- Storage -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-6 rounded-xl border border-purple-200">
                    <div class="flex items-center mb-3">
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <i class="fas fa-hdd text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Съхранение</h3>
                    </div>
                    <p class="text-gray-700 font-medium">{{ $laptop->storage }}</p>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        @if($laptop->description)
            <div class="mt-8 bg-white rounded-2xl shadow-xl p-8 lg:p-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-align-left text-blue-600 mr-3"></i>
                    Описание
                </h2>
                <div class="prose max-w-none">
                    <p class="text-gray-700 text-lg leading-relaxed">{{ $laptop->description }}</p>
                </div>
            </div>
        @endif

        <!-- Back Button -->
        <div class="mt-8 text-center">
            <a href="{{ route('laptops') }}" 
               class="inline-flex items-center px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold rounded-xl border border-gray-300 hover:border-gray-400 transition-all duration-200 shadow-lg hover:shadow-xl">
                <i class="fas fa-arrow-left mr-3"></i>
                Обратно към всички лаптопи
            </a>
        </div>

    </div>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-lg z-50" 
         id="success-message">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 5000);
    </script>
@endif
@endsection