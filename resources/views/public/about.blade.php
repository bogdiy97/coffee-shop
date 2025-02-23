@extends('layouts.app')

@section('title', 'Despre Noi')

@section('content')
<!-- Hero Section -->
<div class="relative h-[40vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('storage/about/about-hero.jpg') }}" alt="About Us Background"
             class="w-full h-full object-cover opacity-80">
        <div class="absolute inset-0 bg-gradient-to-b from-amber-900/50 to-amber-900/70"></div>
    </div>
    <div class="relative z-10 text-center text-white">
        <h1 class="font-playfair text-5xl font-bold mb-4 reveal">Despre Noi</h1>
        <p class="text-xl reveal">Povestea noastră, pasiunea pentru cafea</p>
    </div>
</div>

<!-- Content Section -->
<div class="container mx-auto px-4 py-16">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-8">
                <div class="prose prose-amber max-w-none reveal">
                    {!! $aboutContent->content ?? 'Conținutul va fi disponibil în curând.' !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="bg-amber-900 text-white py-16 mt-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center reveal">
            <h2 class="font-playfair text-3xl font-bold mb-6">Vino să ne Cunoști</h2>
            <p class="text-amber-200 mb-8">
                Te așteptăm să descoperi atmosfera caldă și primitoare a cafenelei noastre
            </p>
            <a href="tel:+40123456789"
               class="inline-block bg-white text-amber-900 px-8 py-3 rounded-full hover:bg-amber-100 transition-colors">
                <i class="fas fa-phone-alt mr-2"></i>Contactează-ne
            </a>
        </div>
    </div>
</div>
@endsection
