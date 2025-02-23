@extends('layouts.admin')

@section('title', 'Editare Pagină Despre Noi')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Editare Pagină Despre Noi</h1>
        <a href="{{ route('about') }}" target="_blank" class="text-amber-900 hover:text-amber-700">
            <i class="fas fa-external-link-alt mr-2"></i>Vezi pagina
        </a>
    </div>

    <form action="{{ route('admin.about.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Conținut</label>
            <textarea id="content" name="content" rows="20"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200">{{ old('content', $aboutContent->content ?? '') }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-amber-900 text-white px-4 py-2 rounded hover:bg-amber-800">
                Salvează Modificările
            </button>
        </div>
    </form>
</div>
@endsection
