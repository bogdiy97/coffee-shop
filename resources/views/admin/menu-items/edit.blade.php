@extends('layouts.admin')

@section('title', 'Editare Produs')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Editare Produs</h1>
        <a href="{{ route('admin.menu-items.index') }}" class="text-amber-900 hover:text-amber-700">
            <i class="fas fa-arrow-left mr-2"></i>Înapoi la Lista de Produse
        </a>
    </div>

    <form action="{{ route('admin.menu-items.update', $menuItem) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nume Produs</label>
            <input type="text" name="name" id="name" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200"
                   value="{{ old('name', $menuItem->name) }}">
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Categorie</label>
            <select name="category" id="category" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200">
                <option value="cafea" {{ $menuItem->category == 'cafea' ? 'selected' : '' }}>Cafea</option>
                <option value="băuturi" {{ $menuItem->category == 'băuturi' ? 'selected' : '' }}>Băuturi</option>
                <option value="patiserie" {{ $menuItem->category == 'patiserie' ? 'selected' : '' }}>Patiserie</option>
                <option value="specialitate" {{ $menuItem->category == 'specialitate' ? 'selected' : '' }}>Specialitate</option>
            </select>
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Preț (lei)</label>
            <input type="number" name="price" id="price" step="0.01" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200"
                   value="{{ old('price', $menuItem->price) }}">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descriere</label>
            <textarea name="description" id="description" rows="3" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200">{{ old('description', $menuItem->description) }}</textarea>
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Imagine Nouă (opțional)</label>
            <input type="file" name="photo" id="photo" accept="image/*"
                   class="mt-1 block w-full">

            @if($menuItem->photo_path)
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Imagine curentă:</p>
                    <img src="{{ asset('storage/' . $menuItem->photo_path) }}"
                         alt="{{ $menuItem->name }}"
                         class="mt-1 h-32 w-32 object-cover rounded">
                </div>
            @endif
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-amber-900 text-white px-4 py-2 rounded hover:bg-amber-800">
                Salvează Modificările
            </button>
        </div>
    </form>
</div>
@endsection
