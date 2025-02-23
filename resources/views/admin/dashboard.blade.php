@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-amber-900 mb-8">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <i class="fas fa-utensils text-3xl text-amber-900 mr-4"></i>
                <div>
                    <h2 class="text-xl font-bold">Produse în Meniu</h2>
                    <p class="text-2xl font-bold text-amber-900">{{ $menuItemsCount }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <i class="fas fa-calendar text-3xl text-amber-900 mr-4"></i>
                <div>
                    <h2 class="text-xl font-bold">Evenimente</h2>
                    <p class="text-2xl font-bold text-amber-900">{{ $eventsCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
