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

    <form action="{{ route('admin.about.update') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Conținut</label>
            <textarea id="content" name="content" rows="20"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200">{{ old('content', $aboutContent->content ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Fotografii Existente</label>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-4">
                @if(isset($aboutContent->photos) && is_array($aboutContent->photos))
                    @foreach($aboutContent->photos as $index => $photo)
                        <div class="relative group photo-container" id="photo_container_{{ $index }}">
                            <img src="{{ asset('storage/' . $photo) }}" alt="About Photo {{ $index + 1 }}"
                                 class="w-full h-40 object-cover rounded">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <button type="button" onclick="markForDeletion({{ $index }})"
                                        class="text-white bg-red-600 p-2 rounded-full">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <input type="hidden" name="remove_photos[{{ $index }}]" id="remove_photo_{{ $index }}" value="0">
                            </div>
                            <div id="deletion_marker_{{ $index }}" class="hidden absolute inset-0 bg-red-500 bg-opacity-30 flex items-center justify-center">
                                <span class="bg-white text-red-600 px-2 py-1 rounded font-bold">Marcat pentru ștergere</span>
                                <button type="button" onclick="undoDeletion({{ $index }})"
                                        class="absolute top-2 right-2 bg-white text-red-600 p-1 rounded-full">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500 italic">Nu există fotografii încărcate.</p>
                @endif
            </div>
        </div>

        <div>
            <label for="photos" class="block text-sm font-medium text-gray-700 mb-2">Adaugă Fotografii Noi</label>
            <input type="file" id="photos" name="photos[]" multiple accept="image/*"
                   class="mt-1 block w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-full file:border-0
                   file:text-sm file:font-semibold
                   file:bg-amber-50 file:text-amber-700
                   hover:file:bg-amber-100">
            <p class="mt-1 text-sm text-gray-500">Puteți selecta mai multe fotografii. Formatele acceptate: JPG, PNG, GIF.</p>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-amber-900 text-white px-4 py-2 rounded hover:bg-amber-800">
                Salvează Modificările
            </button>
        </div>
    </form>
</div>
@endsection
<script>
    function markForDeletion(index) {
        document.getElementById('remove_photo_' + index).value = '1';
        document.getElementById('deletion_marker_' + index).classList.remove('hidden');
    }

    function undoDeletion(index) {
        document.getElementById('remove_photo_' + index).value = '0';
        document.getElementById('deletion_marker_' + index).classList.add('hidden');
    }
    </script>
