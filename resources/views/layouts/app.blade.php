<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', config('app.name', 'National Children\'s Commission'))</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       <!-- Free Font Awesome 6 CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900">
        <header class="border-b border-slate-200 bg-white/95 backdrop-blur-sm sticky top-0 z-30">
            <div class="mx-auto flex max-w-7.5xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ route('home') }}" class="text-lg font-semibold text-emerald-700">NCC</a>
                <div class="hidden sm:flex items-center gap-20">
                    <nav class="flex items-center gap-5 text-sm text-slate-700">
                        <a href="{{ route('home') }}" class="hover:text-emerald-700">Home</a>
                        <a href="{{ route('about') }}" class="hover:text-emerald-700">About</a>
                        <a href="{{ route('services') }}" class="hover:text-emerald-700">What we do</a>
                        <a href="{{ route('reporting') }}" class="hover:text-emerald-700">Reporting</a>
                        <a href="{{ route('get-involved') }}" class="hover:text-emerald-700">Work With Us</a>
                    </nav>
                    <div class="flex items-center gap-3">
      <!-- Child Rights Corner Button -->
        <a href="{{ route('childrens-corner') }}"
           class="flex items-center justify-center border border-gray-300 px-4 py-2 rounded-md font-semibold text-sm uppercase text-gray-800 hover:text-green-700 hover:border-green-700"> 
            <i class="fa-solid fa-child mr-2 text-red-600"></i>
            CHILD RIGHTS CORNER
        </a>

                        <a href="{{ route('reporting') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-semibold">
                            REPORT A CASE NOW
                        </a>
                  
                    </div>
                </div>
            </div>
        </header>

        <main class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        <footer class="bg-green-50 text-gray-700 pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-5 gap-8">
        <!-- Partnerships -->
        <div>
            <h3 class="font-bold text-green-700 mb-4">Partnerships & Stakeholders</h3>
            <ul class="space-y-2">
                <li>Unicef</li>
                <li>NGOCCR</li>
                <li>Save the Children</li>
                <li>World Vision</li>
                <li>Ministry of Gender</li>
            </ul>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="font-bold text-green-700 mb-4">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-green-600">Home</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-green-600">About Us</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-green-600">What We Do</a></li>
                <li><a href="#" class="hover:text-green-600">Resources</a></li>
            </ul>
        </div>

        <!-- Help & Support -->
        <div>
            <h3 class="font-bold text-green-700 mb-4">Help & Support</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('reporting') }}" class="hover:text-green-600">Report a Case</a></li>
                <li><a href="#" class="hover:text-green-600">Check Case Studies</a></li>
                <li><a href="#" class="hover:text-green-600">FAQs</a></li>
                <li><a href="#" class="hover:text-green-600">Contact Us</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="font-bold text-green-700 mb-4">Contact Us</h3>
            <p>P.O Box 30346, Area 12<br> Lilongwe, Malawi</p>
            <p class="mt-2">📞 +265 (0) 880‑268‑418</p>
            <p>✉️ nccmalawi@gmail.com</p>
        </div>

        <!-- Find Us -->
        <div>
            <h3 class="font-bold text-green-700 mb-4">Find Us</h3>
            <img src="{{ asset('images/map-placeholder.jpg') }}" alt="Map" class="rounded shadow-md w-full h-32 object-cover">
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="border-t border-green-200 mt-8 pt-6 px-6 md:px-12 flex flex-col md:flex-row justify-between items-center gap-6">
        <!-- Logo & Newsletter -->
        <div class="flex flex-col md:flex-row items-center gap-6">
            <img src="{{ asset('images/ncc-logo.png') }}" alt="NCC Logo" class="h-16 w-auto">
            <form class="flex gap-2">
                <input type="email" placeholder="Enter your email" class="border border-green-300 rounded px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Subscribe</button>
            </form>
        </div>

        <!-- Helpline & Social -->
        <div class="flex flex-col items-center gap-4 md:flex-row md:items-center md:justify-end md:text-right">
            <div>
                <p class="font-semibold text-green-700">Need Help? Call Our Helpline</p>
            </div>
            <div>
                <p class="text-base font-bold text-green-800">116</p>
            </div>
            <div class="flex items-center gap-4 text-green-700">
                <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>

    </body>
</html>
