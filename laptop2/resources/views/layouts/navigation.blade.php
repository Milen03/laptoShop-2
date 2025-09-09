<!-- filepath: resources/views/layouts/navigation.blade.php -->
<nav class="bg-white border-b border-gray-200 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center text-xl font-bold text-indigo-600">
                    <i class="fas fa-laptop mr-2"></i> Laptop Shop
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600 flex items-center">
                    <i class="fas fa-home mr-1"></i> Начало
                </a>
                <a href="{{ route('laptops') }}" class="text-gray-700 hover:text-indigo-600 flex items-center">
                    <i class="fas fa-laptop mr-1"></i> Лаптопи
                </a>

                @auth
                    <a href="{{ route('laptops.create') }}" class="text-gray-700 hover:text-indigo-600 flex items-center">
                        <i class="fas fa-plus mr-1"></i> Добави лаптоп
                    </a>


                    <!-- Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-700 hover:text-indigo-600 focus:outline-none">
                            <i class="fas fa-user-circle mr-1 text-xl"></i>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-1 text-sm"></i>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="open" @click.away="open = false" 
                             class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-50">
                            
                            <a href="{{ url('/admin') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cogs mr-2"></i> Admin
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Изход
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 flex items-center">
                        <i class="fas fa-sign-in-alt mr-1"></i> Вход
                    </a>
                    <a href="{{ route('register') }}" class="ml-3 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 flex items-center">
                        <i class="fas fa-user-plus mr-1"></i> Регистрация
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-4 pb-3 space-y-2 bg-white border-t">
        <a href="{{ route('home') }}" class="block text-gray-700 hover:text-indigo-600">
            <i class="fas fa-home mr-1"></i> Начало
        </a>
        <a href="{{ route('laptops') }}" class="block text-gray-700 hover:text-indigo-600">
            <i class="fas fa-laptop mr-1"></i> Лаптопи
        </a>
        @auth
        <a href="{{ route('laptops.create') }}" class="block text-gray-700 hover:text-indigo-600">
            <i class="fas fa-plus mr-1"></i> Добави лаптоп
        </a>
       
        <a href="{{ url('/admin') }}" class="block text-gray-700 hover:text-indigo-600">
            <i class="fas fa-cogs mr-1"></i> Admin
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left text-gray-700 hover:text-indigo-600">
                <i class="fas fa-sign-out-alt mr-1"></i> Изход
            </button>
        </form>
        @else
        <a href="{{ route('login') }}" class="block text-gray-700 hover:text-indigo-600">
            <i class="fas fa-sign-in-alt mr-1"></i> Вход
        </a>
        <a href="{{ route('register') }}" class="block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            <i class="fas fa-user-plus mr-1"></i> Регистрация
        </a>
        @endauth
    </div>
</nav>

<!-- Script for mobile menu toggle -->
<script>
    document.getElementById("mobile-menu-button").addEventListener("click", function() {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });
</script>

<!-- Alpine.js for dropdown -->
<script src="https://unpkg.com/alpinejs" defer></script>
<!-- Note: Ensure Alpine.js is included in your project for the dropdown functionality to work -->