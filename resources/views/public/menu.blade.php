@extends('layouts.app')

@section('title', 'Meniu')

@section('content')
<!-- Hero Section -->
<div class="relative h-[40vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('storage/menu/menu-hero.jpg') }}" alt="Menu Background"
             class="w-full h-full object-cover opacity-80">
        <div class="absolute inset-0 bg-gradient-to-b from-amber-900/50 to-amber-900/70"></div>
    </div>
    <div class="relative z-10 text-center text-white">
        <h1 class="font-playfair text-5xl font-bold mb-4 reveal">Meniul Nostru</h1>
        <p class="text-xl reveal">Descoperă aromele care ne definesc</p>
    </div>
</div>

<!-- Menu Categories -->
<div class="container mx-auto px-4 py-12">
    <!-- Category Navigation -->
    <div class="flex flex-wrap justify-center mb-12 gap-4 reveal">
        <button onclick="filterItems('all')"
                class="category-btn bg-amber-100 text-amber-900 px-6 py-2 rounded-full hover:bg-amber-800 hover:text-white transition-colors">
            Toate
        </button>
        @php
            $categories = $menuItems->pluck('category')->unique();
        @endphp
        @foreach($categories as $cat)
            <button onclick="filterItems('{{ $cat }}')"
                    class="category-btn bg-amber-100 text-amber-900 px-6 py-2 rounded-full hover:bg-amber-800 hover:text-white transition-colors">
                {{ ucfirst($cat) }}
            </button>
        @endforeach
    </div>

    <!-- Menu Items Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($menuItems as $item)
        <div class="bg-white rounded-xl overflow-hidden shadow-lg transform hover:-translate-y-1 transition-all reveal menu-item"
             data-category="{{ $item->category }}">
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset('storage/' . $item->photo_path) }}"
                     alt="{{ $item->name }}"
                     class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
            </div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-playfair text-xl font-bold text-amber-900">{{ $item->name }}</h3>
                        <p class="text-sm text-amber-700">{{ ucfirst($item->category) }}</p>
                    </div>
                    <span class="text-lg font-bold text-amber-900">{{ number_format($item->price, 2) }} lei</span>
                </div>
                <p class="text-gray-600">{{ $item->description }}</p>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <div class="max-w-md mx-auto">
                <i class="fas fa-coffee text-6xl text-amber-900 mb-4"></i>
                <h3 class="font-playfair text-2xl font-bold text-amber-900 mb-2">În Curând</h3>
                <p class="text-gray-600">Lucrăm la prepararea celor mai delicioase produse pentru tine.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- Special Offer Banner -->
{{-- <div class="bg-amber-900 text-white py-16 my-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-8 md:mb-0 reveal">
                <h2 class="font-playfair text-3xl font-bold mb-4">Oferta Săptămânii</h2>
                <p class="text-amber-200 mb-6">Descoperă selecția noastră specială de cafea de specialitate</p>
                <a href="#" class="inline-block bg-white text-amber-900 px-8 py-3 rounded-full hover:bg-amber-100 transition-colors">
                    Află mai multe
                </a>
            </div>
            <div class="md:w-1/2 flex justify-end reveal">
                <img src="{{ asset('images/special-coffee.jpg') }}" alt="Special Coffee"
                     class="w-64 h-64 object-cover rounded-full border-4 border-amber-800">
            </div>
        </div>
    </div>
</div> --}}

<!-- Contact CTA -->
<div class="container mx-auto px-4 py-12 text-center">
    <div class="max-w-2xl mx-auto reveal">
        <h2 class="font-playfair text-3xl font-bold text-amber-900 mb-4">Rezervă o Masă</h2>
        <p class="text-gray-600 mb-8">Pentru grupuri mai mari de 6 persoane, te rugăm să ne contactezi în avans</p>
        <a href="tel:+40123456789"
           class="inline-block bg-amber-900 text-white px-8 py-3 rounded-full hover:bg-amber-800 transition-colors">
            <i class="fas fa-phone-alt mr-2"></i>Sună-ne
        </a>
    </div>
</div>

<script>
function filterItems(category) {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });

    // Update active button state
    document.querySelectorAll('.category-btn').forEach(btn => {
        if (btn.textContent.trim().toLowerCase() === category ||
           (category === 'all' && btn.textContent.trim() === 'Toate')) {
            btn.classList.remove('bg-amber-100', 'text-amber-900');
            btn.classList.add('bg-amber-900', 'text-white');
        } else {
            btn.classList.remove('bg-amber-900', 'text-white');
            btn.classList.add('bg-amber-100', 'text-amber-900');
        }
    });
}
</script>

@endsection
