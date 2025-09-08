@extends('layouts.app')

@section('content')
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <section class="hero-section bg-gradient-primary text-black py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Намери перфектния лаптоп за теб</h1>
                <p class="lead mb-4">Най-големият избор от качествени лаптопи на най-добри цени. Бърза доставка и гаранция.</p>
                <a href="{{ route('laptops') }}" class="btn btn-light btn-lg me-3">
                    <i class="fas fa-shopping-bag me-2"></i>Разгледай продукти
                </a>
                <a href="#featured" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-star me-2"></i>Препоръчани
                </a>
            </div>
            
        </div>
    </div>
</section>
</body>
@endsection