@extends('layouts.admin')

@section('title', 'Gestionare Evenimente')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Evenimente</h1>
        <a href="{{ route('admin.events.create') }}"
           class="bg-amber-900 text-white px-4 py-2 rounded hover:bg-amber-800">
            <i class="fas fa-plus mr-2"></i>Adaugă Eveniment
        </a>
    </div>

    <div class="grid gap-6">
        @foreach($events as $event)
            <div class="bg-gray-50 rounded-lg p-4">
                <div class="md:flex items-start gap-6">
                    <div class="md:w-1/4 mb-4 md:mb-0">
                        <img src="{{ asset('storage/' . $event->photo_path) }}"
                             alt="{{ $event->title }}"
                             class="w-full h-48 object-cover rounded">
                    </div>
                    <div class="md:w-3/4">
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="text-xl font-bold text-amber-900">{{ $event->title }}</h2>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.events.edit', $event) }}"
                                   class="text-amber-600 hover:text-amber-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Sigur doriți să ștergeți acest eveniment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p class="text-gray-600">{{ $event->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        @if($events->isEmpty())
            <p class="text-center text-gray-500">Nu există evenimente momentan.</p>
        @endif
    </div>
</div>
@endsection
