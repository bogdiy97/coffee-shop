<!DOCTYPE html>
<html lang="ro" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herd Coffee - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-poppins { font-family: 'Poppins', sans-serif; }

        /* Smooth reveal animation */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    @stack('styles')
</head>
<body class="font-poppins bg-amber-50">
    <!-- Navbar with glass effect -->
    <nav class="fixed w-full z-50 backdrop-blur-md bg-amber-900/90 text-white">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="font-playfair text-2xl font-bold">Herd Coffee</a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('menu') }}" class="hover:text-amber-200 transition-colors">Meniu</a>
                    <a href="{{ route('events') }}" class="hover:text-amber-200 transition-colors">Evenimente</a>
                    <a href="{{ route('about') }}" class="hover:text-amber-200 transition-colors">Despre Noi</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden" id="mobile-menu-button">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden md:hidden bg-amber-900/95" id="mobile-menu">
            <div class="container mx-auto px-4 py-4 space-y-4">
                <a href="{{ route('menu') }}" class="block hover:text-amber-200 transition-colors">Meniu</a>
                <a href="{{ route('events') }}" class="block hover:text-amber-200 transition-colors">Evenimente</a>
                <a href="{{ route('about') }}" class="block hover:text-amber-200 transition-colors">Despre Noi</a>
            </div>
        </div>
    </nav>

    <!-- Main Content with top padding for fixed navbar -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-amber-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 text-center md:text-left">
                <div>
                    <h3 class="font-playfair text-xl mb-4">Contact</h3>
                    <p>Strada Exemplu, Nr. 123</p>
                    <p>București, România</p>
                    <p>contact@herdcoffee.ro</p>
                </div>
                <div>
                    <h3 class="font-playfair text-xl mb-4">Program</h3>
                    <p>Luni - Vineri: 08:00 - 22:00</p>
                    <p>Sâmbătă - Duminică: 09:00 - 23:00</p>
                </div>
                <div>
                    <h3 class="font-playfair text-xl mb-4">Social Media</h3>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="#" class="hover:text-amber-200 transition-colors"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-amber-200 transition-colors"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-amber-200 transition-colors"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Reveal animations on scroll
        function reveal() {
            const reveals = document.querySelectorAll('.reveal');
            reveals.forEach(element => {
                const windowHeight = window.innerHeight;
                const elementTop = element.getBoundingClientRect().top;
                if (elementTop < windowHeight - 100) {
                    element.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', reveal);
        reveal(); // Initial check
    </script>
</body>
</html>
