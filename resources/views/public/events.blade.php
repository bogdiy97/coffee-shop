@extends('layouts.app')

@section('title', 'Evenimente')

@section('content')
<!-- Hero Section -->
<div class="relative h-[40vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('storage/events/events-hero.jpg') }}" alt="Events Background"
             class="w-full h-full object-cover opacity-80">
        <div class="absolute inset-0 bg-gradient-to-b from-amber-900/50 to-amber-900/70"></div>
    </div>
    <div class="relative z-10 text-center text-white">
        <h1 class="font-playfair text-5xl font-bold mb-4 reveal">Evenimente</h1>
        <p class="text-xl reveal">Momente speciale în locații deosebite</p>
    </div>
</div>

<!-- Events Grid -->
<div class="container mx-auto px-4 py-16">
    <div class="grid gap-12">
        @forelse($events as $event)
        <div class="bg-white rounded-xl overflow-hidden shadow-lg reveal">
            <div class="md:flex">
                <div class="md:w-1/2">
                    <div class="relative h-72 md:h-full">
                        <img src="{{ asset('storage/' . $event->photo_path) }}"
                             alt="{{ $event->title }}"
                             class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                    </div>
                </div>
                <div class="md:w-1/2 p-8">
                    <h2 class="font-playfair text-3xl font-bold text-amber-900 mb-4">{{ $event->title }}</h2>
                    <p class="text-gray-600 mb-6">{{ $event->description }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-12">
            <div class="max-w-md mx-auto">
                <i class="fas fa-calendar text-6xl text-amber-900 mb-4"></i>
                <h3 class="font-playfair text-2xl font-bold text-amber-900 mb-2">În Curând</h3>
                <p class="text-gray-600">Pregătim evenimente speciale pentru tine.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- Host Event CTA -->
<div class="bg-amber-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center reveal">
            <h2 class="font-playfair text-3xl font-bold mb-6">Organizează-ți Evenimentul la Noi</h2>
            <p class="text-amber-200 mb-8">
                De la întâlniri de afaceri la aniversări speciale, suntem pregătiți să găzduim evenimentul tău
            </p>
            <a "
               class="inline-block bg-white text-amber-900 px-8 py-3 rounded-full hover:bg-amber-100 transition-colors">
                Ne gasesti la 0744 651 643
            </a>
        </div>
    </div>
</div>

<!-- Testimonials -->
{{-- <div class="container mx-auto px-4 py-16">
    <h2 class="font-playfair text-3xl text-center mb-12 reveal">Ce Spun Clienții Noștri</h2>
    <div class="grid md:grid-cols-3 gap-8">
        @foreach(range(1, 3) as $i)
        <div class="bg-white p-6 rounded-xl shadow-lg reveal">
            <div class="flex items-center mb-4">
                <img src="{{ asset('menu/avatar-' . $i . '.jpg') }}" alt="Avatar"
                     class="w-12 h-12 rounded-full object-cover mr-4">
                <div>
                    <h4 class="font-bold">Client Mulțumit</h4>
                    <div class="flex text-amber-900">
                        @for($j = 0; $j < 5; $j++)
                            <i class="fas fa-star text-sm"></i>
                        @endfor
                    </div>
                </div>
            </div>
            <p class="text-gray-600 italic">
                "Un loc minunat pentru evenimente! Personalul a fost foarte atent la detalii, iar invitații noștri au fost încântați."
            </p>
        </div>
        @endforeach
    </div>
</div> --}}
@endsection
