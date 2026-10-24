<x-public-layout
    :title="setting('site_name', 'AKODO Aimé D. Yves') . ' — Vidéaste & Monteur Vidéo'"
    :description="setting('meta_description', 'Vidéaste, monteur vidéo et créateur de contenu audiovisuel à Cotonou. Montage professionnel, TikTok, Reels, clipping.')"
>
    {{-- ── HERO SECTION ──────────────────────────────────────────────────────── --}}
    <section class="relative overflow-hidden border-b border-cinema-border/50 pt-20 pb-24 sm:pt-28 sm:pb-36">
        {{-- Subtle background radial glow --}}
        <div class="pointer-events-none absolute -top-40 right-1/2 translate-x-1/2 w-[600px] h-[350px] bg-cinema-accent/10 blur-[120px] rounded-full" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-content px-4 sm:px-6 lg:px-8">
            <div class="reveal max-w-3xl">
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full border border-cinema-accent/30 bg-cinema-surface/80 backdrop-blur text-xs font-medium text-cinema-accent">
                    <span class="w-2 h-2 rounded-full bg-cinema-accent animate-pulse"></span>
                    <span>Disponible pour nouveaux projets · Cotonou & International</span>
                </div>

                <h1 class="mt-8 font-display text-hero font-bold tracking-tight text-cinema-text">
                    {{ setting('site_name', 'AKODO Aimé D. Yves') }}
                </h1>

                <p class="mt-6 text-xl sm:text-2xl font-display font-medium text-cinema-accent">
                    Monteur vidéo & Créateur de contenu audiovisuel
                </p>

                <p class="mt-4 max-w-2xl text-base sm:text-lg text-cinema-muted leading-relaxed">
                    Je transforme vos idées en vidéos courtes percutantes pour TikTok, Reels et les réseaux sociaux. Conception, script, cadrage, tournage et montage au standard professionnel.
                </p>

                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <x-btn href="{{ route('portfolio.index') }}" variant="primary">
                        <span>Voir mes projets</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                    </x-btn>

                    <x-btn href="{{ route('contact.create') }}" variant="secondary">
                        <span>Me contacter</span>
                    </x-btn>
                </div>
            </div>
        </div>
    </section>

    {{-- ── PROJETS EN VEDETTE ────────────────────────────────────────────────── --}}
    @if ($featuredProjects->isNotEmpty())
        <section class="py-20 sm:py-28 border-b border-cinema-border/50">
            <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-12">
                    <x-section-title
                        eyebrow="Sélection"
                        title="Projets en vedette"
                        subtitle="Une sélection de mes réalisations les plus marquantes en montage vidéo et création digitale."
                    />

                    <div class="reveal">
                        <x-btn href="{{ route('portfolio.index') }}" variant="ghost">
                            <span>Tous les projets</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </x-btn>
                    </div>
                </div>

                {{-- Responsive Grid: 1 col mobile, 2 col tablet, 3 col desktop --}}
                <div class="reveal grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach ($featuredProjects as $project)
                        <x-project-card :project="$project" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ── SERVICES ──────────────────────────────────────────────────────────── --}}
    @if ($services->isNotEmpty())
        <section class="py-20 sm:py-28 border-b border-cinema-border/50 bg-cinema-surface/30">
            <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
                <x-section-title
                    align="center"
                    eyebrow="Prestations"
                    title="Ce que je peux faire pour vous"
                    subtitle="Des prestations sur mesure conçues pour maximiser l'impact de vos contenus audiovisuels."
                />

                <div class="reveal mt-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($services as $service)
                        <div class="flex flex-col justify-between rounded-2xl border border-cinema-border bg-cinema-surface p-7 hover:border-cinema-accent/40 transition-colors">
                            <div>
                                <div class="w-12 h-12 rounded-xl bg-cinema-accent/10 border border-cinema-accent/25 flex items-center justify-center text-cinema-accent mb-5">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9A2.25 2.25 0 0 0 13.5 5.25h-9A2.25 2.25 0 0 0 2.25 7.5v9A2.25 2.25 0 0 0 4.5 18.75Z" />
                                    </svg>
                                </div>
                                <h3 class="font-display text-lg font-bold text-cinema-text">
                                    {{ $service->title }}
                                </h3>
                                <p class="mt-3 text-sm text-cinema-muted leading-relaxed">
                                    {{ $service->description }}
                                </p>
                            </div>

                            <div class="mt-6 pt-5 border-t border-cinema-border/60 flex items-center justify-between text-xs">
                                <span class="text-cinema-muted">Tarif</span>
                                <span class="font-semibold text-cinema-accent">{{ $service->price ?: 'Sur devis' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 text-center reveal">
                    <x-btn href="{{ route('services') }}" variant="secondary">
                        <span>Voir le détail des prestations</span>
                    </x-btn>
                </div>
            </div>
        </section>
    @endif

    {{-- ── TÉMOIGNAGES ───────────────────────────────────────────────────────── --}}
    @if ($testimonials->isNotEmpty())
        <section class="py-20 sm:py-28 border-b border-cinema-border/50">
            <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
                <x-section-title
                    align="center"
                    eyebrow="Témoignages"
                    title="Ils m'ont fait confiance"
                    subtitle="Retours d'expérience de clients, marques et créateurs avec qui j'ai collaboré."
                />

                <div class="reveal mt-14 grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                    @foreach ($testimonials as $testimonial)
                        <div class="flex flex-col justify-between rounded-2xl border border-cinema-border bg-cinema-surface p-7">
                            <div>
                                <div class="flex items-center gap-1 text-cinema-accent mb-4">
                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-sm text-cinema-text/90 italic leading-relaxed">
                                    « {{ $testimonial->text }} »
                                </p>
                            </div>
                            <div class="mt-6 pt-5 border-t border-cinema-border/60">
                                <p class="font-display text-sm font-semibold text-cinema-text">{{ $testimonial->client_name }}</p>
                                @if ($testimonial->specialty)
                                    <p class="text-xs text-cinema-muted mt-0.5">{{ $testimonial->specialty->name }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ── CTA FINAL ─────────────────────────────────────────────────────────── --}}
    <section class="py-24 sm:py-32 relative overflow-hidden">
        <div class="pointer-events-none absolute bottom-0 left-1/2 -translate-x-1/2 w-[700px] h-[300px] bg-cinema-accent/10 blur-[130px] rounded-full" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-content px-4 sm:px-6 lg:px-8 text-center reveal">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-cinema-accent">Prêt à collaborer ?</p>
            <h2 class="mt-3 font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-cinema-text">
                Donnons vie à vos projets vidéo
            </h2>
            <p class="mt-4 max-w-xl mx-auto text-base sm:text-lg text-cinema-muted">
                Que vous ayez besoin d'un montage ponctuel ou d'un accompagnement continu pour vos réseaux sociaux, discutons-en ensemble.
            </p>
            <div class="mt-8 flex flex-wrap justify-center items-center gap-4">
                <x-btn href="{{ route('contact.create') }}" variant="primary">
                    <span>Démarrer un projet</span>
                </x-btn>
                <x-btn href="{{ route('about') }}" variant="secondary">
                    <span>En savoir plus sur moi</span>
                </x-btn>
            </div>
        </div>
    </section>
</x-public-layout>
