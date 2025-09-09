
<!-- filepath: resources/views/laptops/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <nav class="flex mb-4" aria-label="Breadcrumb">
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
                            <span class="ml-1 text-gray-500 md:ml-2">Добави нов</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="text-3xl font-bold text-gray-900">
                <i class="fas fa-plus-circle text-blue-600 mr-3"></i>
                Добави нов лаптоп
            </h1>
            <p class="mt-2 text-gray-600">Попълни формата за да добавиш нов лаптоп в каталога</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <form action="{{ route('laptops.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
                @csrf

                <!-- Brand and Model Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tag mr-1"></i>Марка *
                        </label>
                        <input type="text" 
                               name="brand" 
                               id="brand" 
                               value="{{ old('brand') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('brand') border-red-500 @enderror" 
                               placeholder="напр. Dell, HP, Lenovo..."
                               required>
                        @error('brand')
                            <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-laptop mr-1"></i>Модел *
                        </label>
                        <input type="text" 
                               name="model" 
                               id="model" 
                               value="{{ old('model') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('model') border-red-500 @enderror" 
                               placeholder="напр. Inspiron 15, ThinkPad X1..."
                               required>
                        @error('model')
                            <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Processor -->
                <div>
                    <label for="processor" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-microchip mr-1"></i>Процесор *
                    </label>
                    <input type="text" 
                           name="processor" 
                           id="processor" 
                           value="{{ old('processor') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('processor') border-red-500 @enderror" 
                           placeholder="напр. Intel i7-12700H, AMD Ryzen 5 5500U..."
                           required>
                    @error('processor')
                        <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- RAM and Storage Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="ram" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-memory mr-1"></i>RAM памет *
                        </label>
                        <input type="text" 
                               name="ram" 
                               id="ram" 
                               value="{{ old('ram') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('ram') border-red-500 @enderror" 
                               placeholder="напр. 8GB DDR4, 16GB DDR5..."
                               required>
                        @error('ram')
                            <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="storage" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-hdd mr-1"></i>Съхранение *
                        </label>
                        <input type="text" 
                               name="storage" 
                               id="storage" 
                               value="{{ old('storage') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('storage') border-red-500 @enderror" 
                               placeholder="напр. 512GB SSD, 1TB HDD..."
                               required>
                        @error('storage')
                            <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-dollar-sign mr-1"></i>Цена (BGN) *
                    </label>
                    <div class="relative">
                        <input type="number" 
                               name="price" 
                               id="price" 
                               step="0.01" 
                               min="0" 
                               value="{{ old('price') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('price') border-red-500 @enderror" 
                               placeholder="напр. 1299.99"
                               required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">BGN</span>
                        </div>
                    </div>
                    @error('price')
                        <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-align-left mr-1"></i>Описание
                    </label>
                    <textarea name="description" 
                              id="description" 
                              rows="4" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('description') border-red-500 @enderror" 
                              placeholder="Опиши особеностите и предимствата на този лаптоп...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-image mr-1"></i>Снимка на лаптопа
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Качи снимка</span>
                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                                </label>
                                <p class="pl-1">или drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF до 2MB</p>
                        </div>
                    </div>
                    <div id="image-preview" class="mt-4 hidden">
                        <img id="preview-img" class="h-32 w-32 object-cover rounded-lg border border-gray-300" src="" alt="Преглед">
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('laptops') }}" 
                       class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Отказ
                    </a>
                    
                    <button type="submit" 
                            class="inline-flex items-center px-8 py-3 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Създай лаптоп
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

// Auto-resize textarea
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('description');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
});
</script>
@endsection