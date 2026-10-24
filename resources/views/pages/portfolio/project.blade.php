<x-public-layout
    :title="$project->title . ' — ' . $specialty->name"
    :description="Str::limit(strip_tags($project->description), 160)"
>
    @php
        $whatsappNumber = preg_replace('/[^0-9]/', '', (string) setting('whatsapp_number', '22901408906'));
        $encodedMessage = urlencode('Bonjour Aimé, je vous contacte à propos de votre projet "' . $project->title . '" vu sur votre portfolio.');
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$encodedMessage}";
    @endphp

    <article class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        {{-- Breadcrumbs / Return link --}}
        <div class="reveal mb-8 flex flex-wrap items-center gap-2 text-xs sm:text-sm text-cinema-muted">
            <a href="{{ route('portfolio.index') }}" class="hover:text-cinema-accent transition-colors">Portfolio</a>
            <span class="text-cinema-border">/</span>
            <a href="{{ route('portfolio.specialty', $specialty) }}" class="hover:text-cinema-accent transition-colors">{{ $specialty->name }}</a>
            <span class="text-cinema-border">/</span>
            <span class="text-cinema-text truncate max-w-[200px] sm:max-w-xs font-medium">{{ $project->title }}</span>
        </div>

        {{-- Project Header Title & Category --}}
        <div class="reveal max-w-3xl mb-8">
            <a href="{{ route('portfolio.specialty', $specialty) }}"
               class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-cinema-accent/15 text-cinema-accent border border-cinema-accent/30 hover:bg-cinema-accent/25 transition-colors">
                <span>{{ $specialty->name }}</span>
            </a>

            <h1 class="mt-4 font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-cinema-text leading-tight">
                {{ $project->title }}
            </h1>
        </div>

        {{-- ── 1. HERO VISUEL (Thumbnail ou Card TikTok cliquable) ────────────── --}}
        <div class="reveal overflow-hidden rounded-3xl border border-cinema-border bg-cinema-surface shadow-2xl relative">
            @if ($project->tiktok_url)
                {{-- Interactive TikTok Card with Cinema Vibe --}}
                <div class="relative aspect-[16/9] w-full flex flex-col items-center justify-center p-6 sm:p-12 text-center overflow-hidden bg-gradient-to-br from-[#121212] via-cinema-surface to-[#1A1A1A]">
                    {{-- Ambient background video notch glow --}}
                    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-cinema-accent/15 via-transparent to-transparent"></div>

                    @if ($project->thumbnail && file_exists(public_path('storage/' . $project->thumbnail)))
                        <img src="{{ asset('storage/' . $project->thumbnail) }}"
                             alt="{{ $project->title }}"
                             class="absolute inset-0 w-full h-full object-cover opacity-35 filter blur-[1px]">
                        <div class="absolute inset-0 bg-cinema-bg/60 backdrop-blur-[2px]"></div>
                    @endif

                    <div class="relative z-10 flex flex-col items-center max-w-md">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 border border-cinema-border text-xs text-cinema-text mb-6 backdrop-blur">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298 0 .59.046.87.135V9.4a6.33 6.33 0 0 0-.87-.06 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 9.07 5.72 6.33 6.33 0 0 0 3.61-5.72V8.75a8.16 8.16 0 0 0 4.77 1.51V6.8a4.88 4.88 0 0 1-1-.11z"/>
                            </svg>
                            <span>Vidéo courte · Format TikTok / Reels</span>
                        </div>

                        {{-- Play action button --}}
                        <a href="{{ $project->tiktok_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="group/btn flex items-center justify-center w-20 h-20 rounded-full bg-cinema-accent text-cinema-bg shadow-[0_0_35px_rgba(212,168,71,0.5)] hover:scale-110 active:scale-95 transition-all duration-300">
                            <svg class="w-8 h-8 fill-current ml-1" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </a>

                        <p class="mt-6 font-display text-lg sm:text-xl font-bold text-cinema-text">
                            Regarder la réalisation sur TikTok
                        </p>
                        <p class="mt-1 text-xs sm:text-sm text-cinema-muted">
                            Cliquez pour ouvrir la vidéo originale en plein écran
                        </p>

                        <div class="mt-6">
                            <x-btn href="{{ $project->tiktok_url }}" variant="secondary" target="_blank" rel="noopener noreferrer">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298 0 .59.046.87.135V9.4a6.33 6.33 0 0 0-.87-.06 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 9.07 5.72 6.33 6.33 0 0 0 3.61-5.72V8.75a8.16 8.16 0 0 0 4.77 1.51V6.8a4.88 4.88 0 0 1-1-.11z"/>
                                </svg>
                                <span>Ouvrir sur TikTok</span>
                            </x-btn>
                        </div>
                    </div>
                </div>
            @elseif ($project->thumbnail && file_exists(public_path('storage/' . $project->thumbnail)))
                <div class="relative aspect-[16/9] w-full overflow-hidden">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}"
                         alt="{{ $project->title }}"
                         class="w-full h-full object-cover">
                </div>
            @else
                <div class="aspect-[16/9] w-full flex flex-col items-center justify-center p-8 bg-gradient-to-br from-cinema-surface via-cinema-elevated to-cinema-bg text-center">
                    <div class="w-16 h-16 rounded-2xl bg-cinema-accent/10 border border-cinema-accent/30 text-cinema-accent flex items-center justify-center mb-4">
                        @if ($specialty->icon === 'code-bracket')
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                            </svg>
                        @else
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9A2.25 2.25 0 0 0 13.5 5.25h-9A2.25 2.25 0 0 0 2.25 7.5v9A2.25 2.25 0 0 0 4.5 18.75Z" />
                            </svg>
                        @endif
                    </div>
                    <p class="font-display text-xl font-bold text-cinema-text">{{ $project->title }}</p>
                    <p class="text-xs text-cinema-muted mt-1 uppercase tracking-wider">{{ $specialty->name }}</p>

                    @if ($project->project_url)
                        <div class="mt-6">
                            <x-btn href="{{ $project->project_url }}" variant="primary" target="_blank" rel="noopener noreferrer">
                                <span>Consulter le projet en direct</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </x-btn>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        {{-- ── 2. LIGNE D'INFOS RAPIDES (Domaine + Tags + Outils + Lien projet) ─────────────── --}}
        <div class="reveal mt-8 p-6 rounded-2xl border border-cinema-border bg-cinema-surface/70 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-sm">
            {{-- Domaine --}}
            <div class="flex flex-col gap-1.5">
                <span class="text-xs uppercase tracking-wider text-cinema-muted font-medium">Domaine</span>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-cinema-accent"></span>
                    <a href="{{ route('portfolio.specialty', $specialty) }}" class="font-semibold text-cinema-text hover:text-cinema-accent transition-colors">
                        {{ $specialty->name }}
                    </a>
                </div>
            </div>

            {{-- Tags --}}
            <div class="flex flex-col gap-1.5">
                <span class="text-xs uppercase tracking-wider text-cinema-muted font-medium">Mots-clés / Tags</span>
                <div class="flex flex-wrap gap-1.5">
                    @forelse ($project->tags ?? [] as $tag)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs bg-cinema-elevated text-cinema-text">
                            #{{ $tag }}
                        </span>
                    @empty
                        <span class="text-xs text-cinema-muted">Général</span>
                    @endforelse
                </div>
            </div>

            {{-- Outils clés --}}
            <div class="flex flex-col gap-1.5">
                <span class="text-xs uppercase tracking-wider text-cinema-muted font-medium">Stack & Outils</span>
                <div class="flex flex-wrap gap-1.5">
                    @forelse ($specialty->tools->take(3) as $tool)
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs bg-cinema-accent/10 text-cinema-accent border border-cinema-accent/20">
                            {{ $tool->name }}
                        </span>
                    @empty
                        <span class="text-xs text-cinema-muted">Suite créative</span>
                    @endforelse
                </div>
            </div>

            {{-- Lien direct --}}
            <div class="flex flex-col gap-1.5">
                <span class="text-xs uppercase tracking-wider text-cinema-muted font-medium">Accès direct</span>
                <div class="flex flex-wrap items-center gap-2">
                    @if ($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h transition-colors">
                            <span>Voir le projet</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"/></svg>
                        </a>
                    @elseif ($project->tiktok_url)
                        <a href="{{ $project->tiktok_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-pink-500/20 text-pink-300 hover:bg-pink-500/30 border border-pink-500/30 transition-colors">
                            <span>TikTok</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"/></svg>
                        </a>
                    @else
                        <span class="text-xs text-cinema-muted">Projet interne</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- ── 3. DESCRIPTION DÉTAILLÉE DU PROJET ─────────────────────────────── --}}
        <div class="reveal mt-10 rounded-3xl border border-cinema-border bg-cinema-surface p-8 sm:p-12">
            <h2 class="font-display text-2xl font-bold text-cinema-text mb-6 flex items-center gap-3">
                <span class="w-1.5 h-6 rounded-full bg-cinema-accent"></span>
                <span>Présentation du projet</span>
            </h2>

            <div class="text-base sm:text-lg text-cinema-muted leading-relaxed whitespace-pre-line space-y-4">
                {{ $project->description }}
            </div>
        </div>

        {{-- ── SECTION DÉDIÉE : ACCÈS DIRECT AU PROJET ───────────────────────── --}}
        @if ($project->project_url || $project->tiktok_url)
            <div class="reveal mt-10 rounded-3xl border border-cinema-border bg-cinema-surface p-8 sm:p-10">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-cinema-border/60 pb-6 mb-6">
                    <div>
                        <h2 class="font-display text-xl sm:text-2xl font-bold text-cinema-text flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <span>Lien direct vers le projet</span>
                        </h2>
                        <p class="mt-1 text-xs sm:text-sm text-cinema-muted">
                            Accédez directement au projet en ligne ou à sa démonstration.
                        </p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-cinema-elevated text-cinema-accent border border-cinema-border shrink-0">
                        Lien vérifié
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Lien 1 : Site web ou Démo / Projet en direct --}}
                    @if ($project->project_url)
                        <a href="{{ $project->project_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="group/link flex flex-col justify-between p-5 rounded-2xl border border-cinema-border bg-cinema-elevated/70 hover:border-cinema-accent hover:bg-cinema-elevated transition-all duration-200">
                            <div class="flex items-center justify-between gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-cinema-accent/15 text-cinema-accent flex items-center justify-center border border-cinema-accent/30 group-hover/link:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                </div>
                                <span class="text-xs text-cinema-accent font-semibold flex items-center gap-1 group-hover/link:translate-x-0.5 transition-transform">
                                    <span>Accéder</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"/></svg>
                                </span>
                            </div>
                            <div>
                                <h3 class="font-display font-bold text-cinema-text group-hover/link:text-cinema-accent transition-colors text-base">
                                    Consulter le projet
                                </h3>
                                <p class="text-xs text-cinema-muted mt-1 truncate">
                                    {{ preg_replace('#^https?://#', '', $project->project_url) }}
                                </p>
                            </div>
                        </a>
                    @endif

                    {{-- Lien 2 : TikTok / Démo vidéo --}}
                    @if ($project->tiktok_url)
                        <a href="{{ $project->tiktok_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="group/link flex flex-col justify-between p-5 rounded-2xl border border-cinema-border bg-cinema-elevated/70 hover:border-cinema-accent hover:bg-cinema-elevated transition-all duration-200">
                            <div class="flex items-center justify-between gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-pink-500/15 text-pink-400 flex items-center justify-center border border-pink-500/30 group-hover/link:scale-110 transition-transform">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298 0 .59.046.87.135V9.4a6.33 6.33 0 0 0-.87-.06 6.34 6.34 0 0 0 9.07 5.72 6.33 6.33 0 0 0 3.61-5.72V8.75a8.16 8.16 0 0 0 4.77 1.51V6.8a4.88 4.88 0 0 1-1-.11z"/>
                                    </svg>
                                </div>
                                <span class="text-xs text-cinema-accent font-semibold flex items-center gap-1 group-hover/link:translate-x-0.5 transition-transform">
                                    <span>Regarder</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"/></svg>
                                </span>
                            </div>
                            <div>
                                <h3 class="font-display font-bold text-cinema-text group-hover/link:text-cinema-accent transition-colors text-base">
                                    Réalisation sur TikTok
                                </h3>
                                <p class="text-xs text-cinema-muted mt-1 truncate">
                                    {{ preg_replace('#^https?://#', '', $project->tiktok_url) }}
                                </p>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        @endif

        {{-- ── 4. GRILLE OUTILS MOBILISÉS ────────────────────────────────────── --}}
        @if ($specialty->tools->isNotEmpty())
            <div class="reveal mt-12">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-display text-xl font-bold text-cinema-text flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-cinema-accent" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.67 2.67 0 0 0 21 17.25l-5.83-5.83m0 0a5.34 5.34 0 1 0-7.55-7.55 5.34 5.34 0 0 0 7.55 7.55Zm-3.18-3.18a2.67 2.67 0 1 1-3.77-3.77 2.67 2.67 0 0 1 3.77 3.77Z" />
                        </svg>
                        <span>Outils & technologies mobilisés</span>
                    </h2>
                    <span class="text-xs text-cinema-muted">Environnement de production</span>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    @foreach ($specialty->tools as $tool)
                        <div class="rounded-2xl border border-cinema-border bg-cinema-surface p-5 flex flex-col justify-between hover:border-cinema-accent/35 transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-cinema-elevated border border-cinema-border flex items-center justify-center text-cinema-accent mb-3">
                                <span class="font-display font-bold text-xs">{{ substr($tool->name, 0, 2) }}</span>
                            </div>
                            <div>
                                <h3 class="font-display font-semibold text-cinema-text text-sm sm:text-base">
                                    {{ $tool->name }}
                                </h3>
                                <p class="text-xs text-cinema-muted mt-0.5">Outil certifié</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- ── 5. NAVIGATION PROJET PRÉCÉDENT / SUIVANT ──────────────────────── --}}
        <div class="reveal mt-16 pt-8 border-t border-cinema-border/70">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                {{-- Projet précédent --}}
                @if ($previousProject)
                    <a href="{{ route('portfolio.project', ['specialty' => $specialty->slug, 'project' => $previousProject->slug]) }}"
                       class="group rounded-2xl border border-cinema-border bg-cinema-surface p-6 hover:border-cinema-accent/40 transition-all duration-200 flex flex-col justify-between">
                        <span class="inline-flex items-center gap-1.5 text-xs text-cinema-muted group-hover:text-cinema-accent transition-colors font-medium">
                            <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            <span>Projet précédent</span>
                        </span>
                        <h4 class="mt-3 font-display text-base sm:text-lg font-bold text-cinema-text group-hover:text-cinema-accent transition-colors line-clamp-1">
                            {{ $previousProject->title }}
                        </h4>
                    </a>
                @else
                    <div class="rounded-2xl border border-cinema-border/40 bg-cinema-surface/40 p-6 opacity-50 flex flex-col justify-between">
                        <span class="text-xs text-cinema-muted">Début de collection</span>
                        <p class="mt-3 text-sm text-cinema-muted font-medium">Premier projet de ce domaine</p>
                    </div>
                @endif

                {{-- Projet suivant --}}
                @if ($nextProject)
                    <a href="{{ route('portfolio.project', ['specialty' => $specialty->slug, 'project' => $nextProject->slug]) }}"
                       class="group rounded-2xl border border-cinema-border bg-cinema-surface p-6 hover:border-cinema-accent/40 transition-all duration-200 flex flex-col justify-between sm:items-end sm:text-right">
                        <span class="inline-flex items-center gap-1.5 text-xs text-cinema-muted group-hover:text-cinema-accent transition-colors font-medium">
                            <span>Projet suivant</span>
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </span>
                        <h4 class="mt-3 font-display text-base sm:text-lg font-bold text-cinema-text group-hover:text-cinema-accent transition-colors line-clamp-1">
                            {{ $nextProject->title }}
                        </h4>
                    </a>
                @else
                    <div class="rounded-2xl border border-cinema-border/40 bg-cinema-surface/40 p-6 opacity-50 flex flex-col justify-between sm:items-end sm:text-right">
                        <span class="text-xs text-cinema-muted">Fin de collection</span>
                        <p class="mt-3 text-sm text-cinema-muted font-medium">Dernier projet de ce domaine</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- ── 6. CTA FINAL WHATSAPP AVEC TITRE DU PROJET PRÉ-REMPLI ─────────── --}}
        <div class="reveal mt-16 rounded-3xl border border-cinema-accent/35 bg-gradient-to-br from-cinema-surface via-cinema-elevated to-cinema-surface p-8 sm:p-12 text-center relative overflow-hidden shadow-2xl">
            <div class="pointer-events-none absolute -bottom-16 left-1/2 -translate-x-1/2 w-[500px] h-[200px] bg-cinema-accent/10 blur-[100px] rounded-full" aria-hidden="true"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-cinema-accent/15 text-cinema-accent border border-cinema-accent/30 mb-4">
                    Collaborer sur un projet similaire
                </span>

                <h3 class="font-display text-2xl sm:text-3xl lg:text-4xl font-bold text-cinema-text">
                    Vous avez aimé ce projet ?
                </h3>

                <p class="mt-4 text-base text-cinema-muted leading-relaxed">
                    Contactez-moi directement sur WhatsApp pour échanger sur vos idées, vos objectifs de diffusion et obtenir une proposition chiffrée.
                </p>

                <div class="mt-8 flex flex-wrap justify-center items-center gap-4">
                    {{-- Direct WhatsApp CTA prefilled with project title --}}
                    <a href="{{ $whatsappUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2.5 rounded-full font-semibold text-sm transition-all duration-200 min-h-[48px] px-8 bg-[#25D366] text-white hover:bg-[#20BA5C] shadow-[0_4px_20px_rgba(37,211,102,0.3)] hover:scale-105 active:scale-95">
                        {{-- WhatsApp Official SVG --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.885-9.885 9.885m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <span>Discuter de ce projet sur WhatsApp</span>
                    </a>

                    <x-btn href="{{ route('contact.create') }}" variant="secondary">
                        <span>Formulaire de contact</span>
                    </x-btn>
                </div>
            </div>
        </div>
    </article>
</x-public-layout>
