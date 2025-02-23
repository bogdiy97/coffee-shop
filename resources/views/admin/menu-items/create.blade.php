@extends('layouts.admin')

@section('title', 'Adaugă Produs Nou')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Adaugă Produs Nou</h1>
        <a href="{{ route('admin.menu-items.index') }}" class="text-amber-900 hover:text-amber-700">
            <i class="fas fa-arrow-left mr-2"></i>Înapoi la Lista de Produse
        </a>
    </div>

    <form action="{{ route('admin.menu-items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nume Produs</label>
            <input type="text" name="name" id="name" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200"
                   value="{{ old('name') }}">
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Categorie</label>
            <select name="category" id="category" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200">
                <option value="cafea">Cafea</option>
                <option value="băuturi">Băuturi</option>
                <option value="patiserie">Patiserie</option>
                <option value="specialitate">Specialitate</option>
            </select>
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Preț (lei)</label>
            <input type="number" name="price" id="price" step="0.01" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200"
                   value="{{ old('price') }}">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descriere</label>
            <textarea name="description" id="description" rows="3" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Imagine</label>
            <input type="file" name="photo" id="photo" accept="image/*"
                   class="mt-1 block w-full">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-amber-900 text-white px-4 py-2 rounded hover:bg-amber-800">
                Salvează Produsul
            </button>
        </div>
    </form>
</div>
@endsection
