<x-public-layout
    title="À propos — Parcours & Compétences"
    description="Vidéaste, monteur vidéo et créateur de contenu audiovisuel basé à Cotonou. Licence Génie Logiciel ESGIS, Master IA."
>
    <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
        {{-- Hero Bio Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            {{-- Portrait Column --}}
            <div class="lg:col-span-5 reveal">
                <div class="relative overflow-hidden rounded-3xl border border-cinema-border bg-cinema-surface shadow-2xl">
                    @if ($about?->photo && file_exists(public_path('storage/' . $about->photo)))
                        <img src="{{ asset('storage/' . $about->photo) }}"
                             alt="{{ setting('site_name', 'AKODO Aimé D. Yves') }}"
                             class="w-full aspect-[4/5] object-cover">
                    @else
                        {{-- Professional Monogram Portrait Placeholder --}}
                        <div class="aspect-[4/5] w-full bg-gradient-to-br from-cinema-surface via-cinema-elevated to-cinema-bg flex flex-col items-center justify-center p-8 text-center border-b border-cinema-border/50">
                            <div class="w-24 h-24 rounded-full border-2 border-cinema-accent/40 bg-cinema-accent/10 flex items-center justify-center text-cinema-accent font-display text-4xl font-bold mb-4 shadow-[0_0_30px_rgba(212,168,71,0.2)]">
                                A
                            </div>
                            <p class="font-display text-xl font-bold text-cinema-text">AKODO Aimé D. Yves</p>
                            <p class="text-xs uppercase tracking-wider text-cinema-accent mt-1">Cotonou, Bénin</p>
                        </div>
                    @endif

                    <div class="p-6 border-t border-cinema-border/60 bg-cinema-surface/90">
                        <div class="flex items-center justify-between text-xs text-cinema-muted">
                            <span>Localisation</span>
                            <span class="font-medium text-cinema-text">Cotonou, Bénin</span>
                        </div>
                        <div class="mt-3 flex items-center justify-between text-xs text-cinema-muted">
                            <span>Disponibilité</span>
                            <span class="font-medium text-cinema-accent">Freelance & Contrats</span>
                        </div>
                    </div>
                </div>

                {{-- Download CV Button if uploaded in settings --}}
                @if (setting('cv_file'))
                    <div class="mt-6">
                        <a href="{{ asset('storage/' . setting('cv_file')) }}"
                           target="_blank"
                           download
                           class="w-full inline-flex items-center justify-center gap-3 rounded-full font-medium text-sm transition-all duration-200 min-h-[48px] px-6 bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h shadow-md">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.5V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            <span>Télécharger mon CV (PDF)</span>
                        </a>
                    </div>
                @endif
            </div>

            {{-- Biography Column --}}
            <div class="lg:col-span-7 reveal">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-cinema-accent">Biographie</p>
                <h1 class="mt-2 font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-cinema-text">
                    L'art du montage au service de vos histoires
                </h1>

                <div class="mt-8 text-base sm:text-lg text-cinema-muted leading-relaxed whitespace-pre-line">
                    {{ $about?->bio ?? "Vidéaste, monteur vidéo et créateur de contenu audiovisuel basé à Cotonou." }}
                </div>

                {{-- Formations & Cursus académique --}}
                <div class="mt-12 pt-8 border-t border-cinema-border/60">
                    <h2 class="font-display text-xl font-bold text-cinema-text mb-6">
                        Formation & Certifications
                    </h2>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-cinema-accent/10 border border-cinema-accent/30 flex items-center justify-center text-cinema-accent shrink-0 mt-0.5">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-display text-base font-semibold text-cinema-text">Master en Intelligence Artificielle</h3>
                                <p class="text-xs text-cinema-accent mt-0.5">En cours</p>
                                <p class="text-sm text-cinema-muted mt-1">Application de l'IA aux médias numériques, automatisation et vision par ordinateur.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-cinema-accent/10 border border-cinema-accent/30 flex items-center justify-center text-cinema-accent shrink-0 mt-0.5">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-display text-base font-semibold text-cinema-text">Licence en Génie Logiciel — ESGIS</h3>
                                <p class="text-xs text-cinema-accent mt-0.5">Promotion 2026</p>
                                <p class="text-sm text-cinema-muted mt-1">Conception logicielle, développement mobile (Flutter) et applications web modernes (Laravel, React, Node.js).</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-cinema-accent/10 border border-cinema-accent/30 flex items-center justify-center text-cinema-accent shrink-0 mt-0.5">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9A2.25 2.25 0 0 0 13.5 5.25h-9A2.25 2.25 0 0 0 2.25 7.5v9A2.25 2.25 0 0 0 4.5 18.75Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-display text-base font-semibold text-cinema-text">Formation en Design Graphique & Montage Vidéo</h3>
                                <p class="text-xs text-cinema-muted mt-0.5">Spécialisation Format Court & Storytelling</p>
                                <p class="text-sm text-cinema-muted mt-1">Maîtrise du cadrage, du rythme de coupe, du sound design et des stratégies d'engagement pour les réseaux sociaux.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Competences & Tools grouped by visible specialty --}}
        <div class="reveal mt-20 pt-16 border-t border-cinema-border/60">
            <x-section-title
                eyebrow="Compétences"
                title="Savoir-faire & Outils maîtrisés"
                subtitle="Technologies et techniques mobilisées pour chaque univers de travail."
            />

            <div class="mt-12 space-y-12">
                @foreach ($specialties as $specialty)
                    <div class="rounded-3xl border border-cinema-border bg-cinema-surface/70 p-6 sm:p-10">
                        <div class="flex items-center justify-between gap-4 border-b border-cinema-border/60 pb-5 mb-8">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-cinema-accent/15 text-cinema-accent border border-cinema-accent/30">
                                    {{ $specialty->name }}
                                </span>
                            </div>
                            <span class="text-xs text-cinema-muted">Niveaux de maîtrise évalués</span>
                        </div>

                        {{-- Skills Grid: 2 columns mobile / 3 columns desktop with progress bars --}}
                        <div class="mb-8">
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                                @foreach ($specialty->skills as $skill)
                                    <x-skill-card :skill="$skill" />
                                @endforeach
                            </div>
                        </div>

                        {{-- Tools in separate pills below --}}
                        @if ($specialty->tools->isNotEmpty())
                            <div class="pt-6 border-t border-cinema-border/60">
                                <span class="text-xs uppercase tracking-wider text-cinema-muted font-semibold block mb-3">Outils & technologies maîtrisés</span>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($specialty->tools as $tool)
                                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-medium bg-cinema-elevated text-cinema-text border border-cinema-border/60 shadow-sm">
                                            {{ $tool->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-public-layout>
