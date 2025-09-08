@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col">
<!-- Hero Section -->
    <section class="flex-grow flex items-center justify-center bg-gradient-to-r from-indigo-50 to-white">
        <div class="text-center max-w-2xl px-6">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-6">
                Намери <span class="text-indigo-600">перфектния лаптоп</span> за теб
            </h1>
            <p class="text-lg text-gray-600 mb-8">
                Огромен избор от качествени лаптопи на най-добри цени. Бърза доставка и гаранция.
            </p>
            <a href="{{ route('laptops') }}"
               class="bg-indigo-600 text-white px-8 py-4 rounded-lg text-lg font-semibold shadow hover:bg-indigo-700 transition">
                <i class="fas fa-shopping-bag mr-2"></i> Разгледай продукти
            </a>
        </div>
    </section>
</div>
@endsection