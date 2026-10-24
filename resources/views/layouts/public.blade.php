<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0E0E0E">

    @php
        $siteName = setting('site_name', config('app.name', 'AKODO Aimé D. Yves'));
        $pageTitle = $title ? $title . ' — ' . $siteName : $siteName . ' — Vidéaste & Monteur Vidéo';
        $metaDesc = $description ?: setting('meta_description', 'Vidéaste, monteur vidéo et créateur de contenu audiovisuel à Cotonou.');
        $currentUrl = url()->current();
        $ogImage = asset('images/admin-icon-512.png');
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDesc }}">
    <link rel="canonical" href="{{ $currentUrl }}">

    {{-- Open Graph / Facebook / LinkedIn --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDesc }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:locale" content="fr_FR">

    {{-- Twitter / X Cards --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $currentUrl }}">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $metaDesc }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col" x-data="{ menuOpen: false }" :class="{ 'overflow-hidden': menuOpen }">
    <a href="#contenu" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[60] focus:bg-cinema-accent focus:text-cinema-bg focus:px-4 focus:py-2 focus:rounded">
        Aller au contenu
    </a>

    <header class="sticky top-0 z-40 border-b border-cinema-border/60 bg-cinema-bg/90 backdrop-blur-sm">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-display text-lg font-bold tracking-tight text-cinema-text">
                AKODO<span class="text-cinema-accent">.</span>
            </a>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium" aria-label="Navigation principale">
                <a href="{{ route('portfolio.index') }}" @class(['transition-colors hover:text-cinema-text', 'text-cinema-text' => request()->routeIs('portfolio.*'), 'text-cinema-muted' => ! request()->routeIs('portfolio.*')])>Portfolio</a>
                <a href="{{ route('services') }}" @class(['transition-colors hover:text-cinema-text', 'text-cinema-text' => request()->routeIs('services'), 'text-cinema-muted' => ! request()->routeIs('services')])>Services</a>
                <a href="{{ route('about') }}" @class(['transition-colors hover:text-cinema-text', 'text-cinema-text' => request()->routeIs('about'), 'text-cinema-muted' => ! request()->routeIs('about')])>À propos</a>
                <a href="{{ route('contact.create') }}" class="inline-flex items-center h-10 px-5 rounded-full bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h transition-colors">
                    Me contacter
                </a>
            </nav>

            <button type="button"
                    class="md:hidden -mr-2 inline-flex items-center justify-center w-11 h-11 text-cinema-text hover:text-cinema-accent transition-colors"
                    @click="menuOpen = true"
                    :aria-expanded="menuOpen.toString()"
                    aria-controls="menu-mobile"
                    aria-label="Ouvrir le menu">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 7.5h16.5M3.75 12h16.5m-16.5 4.5h16.5"/></svg>
            </button>
        </div>

        {{-- [WHY] Fullscreen opaque mobile menu (fixed inset-0 z-50 bg-[#0E0E0E]) without transparency --}}
        <nav id="menu-mobile"
             x-show="menuOpen" x-cloak
             x-transition:enter="transition ease-out duration-250"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @keydown.escape.window="menuOpen = false"
             class="md:hidden fixed inset-0 z-50 bg-[#0E0E0E] px-6 py-6 sm:px-8 flex flex-col justify-between overflow-y-auto"
             aria-label="Navigation mobile">

            {{-- Top bar inside full-screen menu --}}
            <div class="flex items-center justify-between border-b border-cinema-border/60 pb-5">
                <a href="{{ route('home') }}" @click="menuOpen = false" class="font-display text-xl font-bold tracking-tight text-cinema-text">
                    AKODO<span class="text-cinema-accent">.</span>
                </a>

                <button type="button"
                        class="inline-flex items-center justify-center w-11 h-11 rounded-full text-cinema-muted hover:text-cinema-text hover:bg-cinema-surface transition-colors"
                        @click="menuOpen = false"
                        aria-label="Fermer le menu">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Primary Navigation Links --}}
            <div class="py-8 flex flex-col divide-y divide-cinema-border/50 font-display text-2xl sm:text-3xl font-bold">
                <a href="{{ route('home') }}"
                   @click="menuOpen = false"
                   @class(['py-4 transition-colors', 'text-cinema-accent' => request()->routeIs('home'), 'text-cinema-text hover:text-cinema-accent' => ! request()->routeIs('home')])>
                    Accueil
                </a>
                <a href="{{ route('portfolio.index') }}"
                   @click="menuOpen = false"
                   @class(['py-4 transition-colors', 'text-cinema-accent' => request()->routeIs('portfolio.*'), 'text-cinema-text hover:text-cinema-accent' => ! request()->routeIs('portfolio.*')])>
                    Portfolio
                </a>
                <a href="{{ route('services') }}"
                   @click="menuOpen = false"
                   @class(['py-4 transition-colors', 'text-cinema-accent' => request()->routeIs('services'), 'text-cinema-text hover:text-cinema-accent' => ! request()->routeIs('services')])>
                    Services
                </a>
                <a href="{{ route('about') }}"
                   @click="menuOpen = false"
                   @class(['py-4 transition-colors', 'text-cinema-accent' => request()->routeIs('about'), 'text-cinema-text hover:text-cinema-accent' => ! request()->routeIs('about')])>
                    À propos
                </a>
                <a href="{{ route('contact.create') }}"
                   @click="menuOpen = false"
                   @class(['py-4 transition-colors', 'text-cinema-accent' => request()->routeIs('contact.*'), 'text-cinema-text hover:text-cinema-accent' => ! request()->routeIs('contact.*')])>
                    Contact
                </a>
            </div>

            {{-- Bottom Action & Quick Contacts --}}
            <div class="pt-6 border-t border-cinema-border/60 flex flex-col gap-4">
                <a href="{{ route('contact.create') }}"
                   @click="menuOpen = false"
                   class="inline-flex items-center justify-center h-14 rounded-full bg-cinema-accent text-cinema-bg font-semibold text-base hover:bg-cinema-accent-h transition-colors shadow-lg">
                    <span>Me contacter</span>
                </a>

                @if(setting('whatsapp_number'))
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', (string) setting('whatsapp_number')) }}?text=Bonjour+Aim%C3%A9%2C+je+vous+contacte+depuis+votre+portfolio."
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 text-xs text-cinema-muted hover:text-[#25D366] transition-colors py-2">
                        <span>Écrire sur WhatsApp (+229)</span>
                    </a>
                @endif
            </div>
        </nav>
    </header>

    <main id="contenu" class="flex-1">
        {{ $slot }}
    </main>

    <footer class="border-t border-cinema-border">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8 py-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between text-sm text-cinema-muted">
            <div>
                <p class="font-display text-base font-semibold text-cinema-text">{{ config('app.name') }}</p>
                <p class="mt-1">Vidéaste & monteur — Cotonou, Bénin</p>
            </div>
            <nav class="flex flex-wrap gap-x-6 gap-y-2" aria-label="Liens du pied de page">
                <a href="{{ route('portfolio.index') }}" class="hover:text-cinema-text transition-colors">Portfolio</a>
                <a href="{{ route('services') }}" class="hover:text-cinema-text transition-colors">Services</a>
                <a href="{{ route('contact.create') }}" class="hover:text-cinema-text transition-colors">Contact</a>
            </nav>
            <p>&copy; {{ now()->year }} {{ setting('site_name', config('app.name')) }}</p>
        </div>
    </footer>

    {{-- [WHY] Floating WhatsApp quick-contact accessible on every public page --}}
    <x-whatsapp-btn />
</body>
</html>
