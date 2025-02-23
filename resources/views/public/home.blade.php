@extends('layouts.app')

@section('title', 'Bun Venit')

@section('content')
<!-- Hero Section with Parallax -->
<div class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('storage/home/hero-bg.jpg') }}" alt="Coffee Background"
             class="w-full h-full object-cover opacity-80">
        <div class="absolute inset-0 bg-gradient-to-b from-amber-900/50 to-amber-900/70"></div>
    </div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="font-playfair text-5xl md:text-7xl font-bold mb-4 reveal">Herd Coffee</h1>
        <p class="text-xl md:text-2xl mb-8 reveal">Experiența perfectă a cafelei artizanale</p>
    </div>
</div>

<!-- Quick Links -->
<div class="container mx-auto px-4 py-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-xl shadow-lg transform hover:-translate-y-1 transition-all reveal">
            <h2 class="font-playfair text-2xl font-bold text-amber-900 mb-4">Meniu</h2>
            <p class="text-gray-600 mb-6">Descoperă selecția noastră de cafele și deserturi artizanale</p>
            <a href="{{ route('menu') }}"
               class="text-amber-900 hover:text-amber-700 font-medium inline-flex items-center">
                Explorează meniul <span class="ml-2">→</span>
            </a>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-lg transform hover:-translate-y-1 transition-all reveal">
            <h2 class="font-playfair text-2xl font-bold text-amber-900 mb-4">Evenimente</h2>
            <p class="text-gray-600 mb-6">Află despre evenimentele și workshop-urile noastre</p>
            <a href="{{ route('events') }}"
               class="text-amber-900 hover:text-amber-700 font-medium inline-flex items-center">
                Vezi evenimente <span class="ml-2">→</span>
            </a>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-lg transform hover:-translate-y-1 transition-all reveal">
            <h2 class="font-playfair text-2xl font-bold text-amber-900 mb-4">Despre Noi</h2>
            <p class="text-gray-600 mb-6">Descoperă povestea și pasiunea din spatele Herd Coffee</p>
            <a href="{{ route('about') }}"
               class="text-amber-900 hover:text-amber-700 font-medium inline-flex items-center">
                Citește povestea <span class="ml-2">→</span>
            </a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }

    footer {
        margin-top: auto;
    }
</style>
@endpush
