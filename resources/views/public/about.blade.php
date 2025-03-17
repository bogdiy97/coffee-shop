@extends('layouts.app')

@section('title', 'Despre Noi')

@section('content')
<!-- Hero Section -->
<div class="relative h-[40vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('storage/about/about-hero.jpg') }}" alt="About Us Background"
             class="w-full h-full object-cover opacity-80">
        <div class="absolute inset-0 bg-gradient-to-b from-amber-900/50 to-amber-900/70"></div>
    </div>
    <div class="relative z-10 text-center text-white">
        <h1 class="font-playfair text-5xl font-bold mb-4 reveal">Despre Noi</h1>
        <p class="text-xl reveal">Povestea noastră, pasiunea pentru cafea</p>
    </div>
</div>

<!-- Content Section -->
<div class="container mx-auto px-4 py-16">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-8">
                <div class="prose prose-amber max-w-none reveal">
                    {!! $aboutContent->content ?? 'Conținutul va fi disponibil în curând.' !!}
                </div>

                @if(isset($aboutContent->photos) && is_array($aboutContent->photos) && count($aboutContent->photos) > 0)
                    <div class="mt-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 reveal">
                            @foreach($aboutContent->photos as $index => $photo)
                                <div class="overflow-hidden rounded-lg shadow-md cursor-pointer hover:shadow-xl transition-shadow">
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Despre Noi"
                                         class="w-full h-80 object-cover transition-transform hover:scale-105 gallery-img"
                                         data-index="{{ $index }}" onclick="openLightbox({{ $index }})">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Lightbox -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-3xl">&times;</button>
    <button onclick="prevImage()" class="absolute left-4 text-white text-5xl opacity-70 hover:opacity-100">&lsaquo;</button>
    <button onclick="nextImage()" class="absolute right-4 text-white text-5xl opacity-70 hover:opacity-100">&rsaquo;</button>

    <div class="max-w-4xl max-h-[80vh] overflow-hidden">
        <img id="lightbox-img" src="" alt="Imagine Mărită"
             class="max-w-full max-h-[80vh] object-contain">
    </div>
</div>

<!-- Contact Section -->
<div class="bg-amber-900 text-white py-16 mt-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center reveal">
            <h2 class="font-playfair text-3xl font-bold mb-6">Vino să ne Cunoști</h2>
            <p class="text-amber-200 mb-8">
                Te așteptăm să descoperi atmosfera caldă și primitoare a cafenelei noastre
            </p>
            <a
               class="inline-block bg-white text-amber-900 px-8 py-3 rounded-full hover:bg-amber-100 transition-colors">
                <i class="fas fa-phone-alt mr-2"></i> 0744 651 643
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Gallery variables
    let currentIndex = 0;
    const photos = [
        @if(isset($aboutContent->photos) && is_array($aboutContent->photos))
            @foreach($aboutContent->photos as $photo)
                "{{ asset('storage/' . $photo) }}",
            @endforeach
        @endif
    ];

    // Open lightbox function
    function openLightbox(index) {
        currentIndex = index;
        document.getElementById('lightbox-img').src = photos[index];
        document.getElementById('lightbox').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    // Close lightbox function
    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Next image function
    function nextImage() {
        currentIndex = (currentIndex + 1) % photos.length;
        document.getElementById('lightbox-img').src = photos[currentIndex];
    }

    // Previous image function
    function prevImage() {
        currentIndex = (currentIndex - 1 + photos.length) % photos.length;
        document.getElementById('lightbox-img').src = photos[currentIndex];
    }

    // Handle keyboard navigation
    document.addEventListener('keydown', function(event) {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;

        if (event.key === 'Escape') {
            closeLightbox();
        } else if (event.key === 'ArrowRight') {
            nextImage();
        } else if (event.key === 'ArrowLeft') {
            prevImage();
        }
    });

    // Close lightbox when clicking outside the image
    document.getElementById('lightbox').addEventListener('click', function(event) {
        if (event.target.id === 'lightbox') {
            closeLightbox();
        }
    });
</script>
@endpush

@endsection
