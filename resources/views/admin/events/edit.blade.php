@extends('layouts.admin')

@section('title', 'Editare Eveniment')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Editare Eveniment</h1>
        <a href="{{ route('admin.events.index') }}" class="text-amber-900 hover:text-amber-700">
            <i class="fas fa-arrow-left mr-2"></i>Înapoi la Evenimente
        </a>
    </div>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titlu Eveniment</label>
            <input type="text" name="title" id="title" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200"
                   value="{{ old('title', $event->title) }}">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descriere</label>
            <textarea name="description" id="description" rows="4" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200">{{ old('description', $event->description) }}</textarea>
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Imagine Nouă (opțional)</label>
            <input type="file" name="photo" id="photo" accept="image/*"
                   class="mt-1 block w-full">

            @if($event->photo_path)
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Imagine curentă:</p>
                    <img src="{{ asset('storage/' . $event->photo_path) }}"
                         alt="{{ $event->title }}"
                         class="mt-1 h-48 w-full md:w-1/3 object-cover rounded">
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
