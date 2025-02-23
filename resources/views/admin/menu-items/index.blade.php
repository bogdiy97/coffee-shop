@extends('layouts.admin')

@section('title', 'Gestionare Meniu')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Produse în Meniu</h1>
        <a href="{{ route('admin.menu-items.create') }}"
           class="bg-amber-900 text-white px-4 py-2 rounded hover:bg-amber-800">
            <i class="fas fa-plus mr-2"></i>Adaugă Produs
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagine</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nume</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categorie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preț</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acțiuni</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($menuItems as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('storage/' . $item->photo_path) }}"
                                 alt="{{ $item->name }}"
                                 class="h-12 w-12 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">{{ $item->name }}</td>
                        <td class="px-6 py-4">{{ $item->category }}</td>
                        <td class="px-6 py-4">{{ number_format($item->price, 2) }} lei</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('admin.menu-items.edit', $item) }}"
                               class="text-amber-600 hover:text-amber-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.menu-items.destroy', $item) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Sigur doriți să ștergeți acest produs?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
