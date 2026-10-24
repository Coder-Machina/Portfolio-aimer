<x-public-layout
    title="À propos — Parcours & Compétences"
    description="Vidéaste, monteur vidéo et créateur de contenu audiovisuel basé à Cotonou. Licence Génie Logiciel ESGIS, Master IA."
>
    <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

        {{-- ───────────────────────────────────────────────────────────────── --}}
        {{-- SECTION 1 : HERO PROFIL & BIOGRAPHIE (Harmonie 2 colonnes)       --}}
        {{-- ───────────────────────────────────────────────────────────────── --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 xl:gap-16 items-start">
            
            {{-- Colonne Gauche : Carte Profil Sticky sur grand écran --}}
            <div class="lg:col-span-5 lg:sticky lg:top-28 reveal">
                <div class="overflow-hidden rounded-3xl border border-cinema-border bg-cinema-surface/90 shadow-2xl backdrop-blur-md">
                    {{-- Photo / Monogramme --}}
                    @if ($about?->photo && file_exists(public_path('storage/' . $about->photo)))
                        <img src="{{ asset('storage/' . $about->photo) }}"
                             alt="{{ setting('site_name', 'AKODO Aimé D. Yves') }}"
                             class="w-full aspect-[4/5] object-cover">
                    @else
                        {{-- Monogramme Portrait Cinéma avec halo lumineux --}}
                        <div class="aspect-[4/5] w-full bg-gradient-to-br from-cinema-surface via-cinema-elevated to-cinema-bg flex flex-col items-center justify-center p-8 text-center relative border-b border-cinema-border/50">
                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(212,168,71,0.12)_0%,transparent_70%)] pointer-events-none"></div>
                            
                            <div class="w-24 h-24 rounded-full border-2 border-cinema-accent/50 bg-cinema-accent/10 flex items-center justify-center text-cinema-accent font-display text-4xl font-bold mb-4 shadow-[0_0_40px_rgba(212,168,71,0.25)] relative">
                                A
                            </div>
                            <h2 class="font-display text-2xl font-bold text-cinema-text">AKODO Aimé D. Yves</h2>
                            <p class="text-xs uppercase tracking-[0.2em] text-cinema-accent font-semibold mt-1">
                                Vidéaste • Monteur • Créateur IA
                            </p>
                        </div>
                    @endif

                    {{-- Badges d'informations rapides --}}
                    <div class="p-6 space-y-3.5 bg-cinema-surface">
                        <div class="flex items-center justify-between text-xs pb-3 border-b border-cinema-border/60">
                            <span class="text-cinema-muted">Localisation</span>
                            <span class="font-medium text-cinema-text flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-cinema-accent" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                Cotonou, Bénin
                            </span>
                        </div>

                        <div class="flex items-center justify-between text-xs pb-3 border-b border-cinema-border/60">
                            <span class="text-cinema-muted">Disponibilité</span>
                            <span class="inline-flex items-center gap-1.5 font-semibold text-emerald-400">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                Freelance & Contrats
                            </span>
                        </div>

                        <div class="flex items-center justify-between text-xs">
                            <span class="text-cinema-muted">Formation socle</span>
                            <span class="font-medium text-cinema-accent">Licence Génie Logiciel (ESGIS)</span>
                        </div>
                    </div>
                </div>

                {{-- Boutons d'Action Rapide --}}
                <div class="mt-5 space-y-3">
                    {{-- Bouton Télécharger CV --}}
                    @php
                        $cvUrl = setting('cv_file') && file_exists(public_path('storage/' . setting('cv_file')))
                            ? asset('storage/' . setting('cv_file'))
                            : (file_exists(public_path('docs/cv-akodo-aime.pdf')) ? asset('docs/cv-akodo-aime.pdf') : null);
                    @endphp

                    @if ($cvUrl)
                        <a href="{{ $cvUrl }}"
                           target="_blank"
                           download="CV-AKODO-Aime-D-Yves.pdf"
                           class="w-full inline-flex items-center justify-center gap-2.5 rounded-full font-semibold text-sm transition-all duration-200 min-h-[48px] px-6 bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h hover:shadow-[0_0_25px_rgba(212,168,71,0.35)] shadow-md">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.5V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            <span>Télécharger mon CV (PDF)</span>
                        </a>
                    @endif

                    {{-- Bouton WhatsApp direct --}}
                    @php
                        $whatsappNumber = setting('whatsapp_number', '2290140890634');
                        $whatsappMsg = urlencode("Bonjour Aimé, j'ai consulté votre portfolio et je souhaite échanger avec vous sur un projet.");
                    @endphp
                    <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $whatsappMsg }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-full inline-flex items-center justify-center gap-2.5 rounded-full font-semibold text-sm transition-all duration-200 min-h-[46px] px-6 bg-cinema-surface border border-cinema-border/80 text-cinema-text hover:border-emerald-500/50 hover:text-emerald-400">
                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                        <span>Discuter sur WhatsApp</span>
                    </a>
                </div>

                {{-- Bloc Langues Pratiquées --}}
                @if (!empty($about?->languages))
                    <div class="mt-6 rounded-2xl border border-cinema-border/60 bg-cinema-surface/60 p-5">
                        <span class="text-[11px] uppercase tracking-wider text-cinema-muted font-semibold block mb-3">
                            Langues maîtrisées
                        </span>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($about->languages as $lang)
                                <div class="flex items-center justify-between px-3 py-2 rounded-xl bg-cinema-elevated/70 border border-cinema-border/40 text-xs">
                                    <span class="font-medium text-cinema-text">{{ $lang['language'] ?? '' }}</span>
                                    <span class="text-cinema-accent font-semibold text-[10px] uppercase tracking-wider">
                                        {{ $lang['level'] ?? '' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Colonne Droite : Titre, Biographie & Personnalité --}}
            <div class="lg:col-span-7 reveal space-y-8">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-cinema-accent/10 text-cinema-accent border border-cinema-accent/25">
                        <span class="w-1.5 h-1.5 rounded-full bg-cinema-accent"></span>
                        À propos de moi
                    </span>

                    <h1 class="mt-4 font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-cinema-text leading-[1.15]">
                        {{ $about?->headline ?? "L'art du montage au service de vos histoires" }}
                    </h1>
                </div>

                {{-- Texte de biographie --}}
                <div class="rounded-3xl border border-cinema-border/70 bg-cinema-surface/50 p-6 sm:p-8 backdrop-blur-sm">
                    <p class="text-xs uppercase tracking-wider text-cinema-accent font-semibold mb-3">Mon Parcours & Ma Vision</p>
                    <div class="text-base sm:text-lg text-cinema-muted leading-relaxed whitespace-pre-line font-normal">
                        {{ $about?->bio ?? "Titulaire d'une Licence en Génie Logiciel obtenue en juin 2026 et actuellement en Master en Intelligence Artificielle, je suis vidéaste, monteur vidéo et créateur de contenu. Je conçois mes contenus de A à Z : idée, concept, script, cadrage, tournage et montage." }}
                    </div>
                </div>

                {{-- Qualités & Atouts Professionnels --}}
                @if (!empty($about?->qualities))
                    <div>
                        <h2 class="text-xs uppercase tracking-wider text-cinema-muted font-semibold block mb-3">
                            Qualités & Atouts professionnels
                        </h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($about->qualities as $quality)
                                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-cinema-elevated text-cinema-text border border-cinema-border/70 hover:border-cinema-accent/40 transition-colors">
                                    <svg class="w-3 h-3 text-cinema-accent" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    {{ $quality }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Centres d'intérêt & Passions --}}
                @if (!empty($about?->interests))
                    <div>
                        <h2 class="text-xs uppercase tracking-wider text-cinema-muted font-semibold block mb-3">
                            Centres d'intérêt & Passions
                        </h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($about->interests as $interest)
                                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-medium bg-cinema-accent/10 text-cinema-accent border border-cinema-accent/20">
                                    {{ $interest }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- ───────────────────────────────────────────────────────────────── --}}
        {{-- SECTION 2 : PARCOURS — EXPÉRIENCES & FORMATIONS EN DOUBLE COLONNE --}}
        {{-- ───────────────────────────────────────────────────────────────── --}}
        <div class="reveal mt-20 pt-16 border-t border-cinema-border/60">
            <x-section-title
                eyebrow="Parcours"
                title="Expériences & Cursus académique"
                subtitle="L'alliance de la pratique terrain, du storytelling vidéo et de la rigueur en ingénierie logicielle."
            />

            <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-start">
                
                {{-- COLONNE 1 : EXPÉRIENCES PROFESSIONNELLES --}}
                <div class="space-y-6">
                    <div class="flex items-center justify-between pb-3 border-b border-cinema-border/60">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-cinema-accent/10 text-cinema-accent flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v1.074m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </div>
                            <h2 class="font-display text-lg font-bold text-cinema-text">Expériences sur le terrain</h2>
                        </div>
                        <span class="text-xs text-cinema-accent font-semibold uppercase tracking-wider">Professionnel</span>
                    </div>

                    @if (!empty($about?->experiences))
                        <div class="space-y-4">
                            @foreach ($about->experiences as $exp)
                                <div class="rounded-2xl border border-cinema-border/70 bg-cinema-surface/60 hover:bg-cinema-surface hover:border-cinema-accent/40 transition-all duration-200 p-5 sm:p-6 shadow-md hover:shadow-lg">
                                    <div class="flex flex-wrap items-start justify-between gap-2">
                                        <h3 class="font-display text-base font-semibold text-cinema-text">
                                            {{ $exp['role'] ?? '' }}
                                        </h3>
                                        <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full bg-cinema-accent/15 text-cinema-accent border border-cinema-accent/25">
                                            {{ $exp['period'] ?? '' }}
                                        </span>
                                    </div>
                                    <p class="text-xs font-medium text-cinema-accent mt-1 flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-cinema-accent"></span>
                                        {{ $exp['company'] ?? '' }}
                                    </p>
                                    @if (!empty($exp['description']))
                                        <p class="text-sm text-cinema-muted mt-2.5 leading-relaxed">
                                            {{ $exp['description'] }}
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- COLONNE 2 : FORMATIONS ACADÉMIQUES --}}
                <div class="space-y-6">
                    <div class="flex items-center justify-between pb-3 border-b border-cinema-border/60">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-cinema-accent/10 text-cinema-accent flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <h2 class="font-display text-lg font-bold text-cinema-text">Cursus & Diplômes</h2>
                        </div>
                        <span class="text-xs text-cinema-accent font-semibold uppercase tracking-wider">Académique</span>
                    </div>

                    @if (!empty($about?->educations))
                        <div class="space-y-4">
                            @foreach ($about->educations as $edu)
                                <div class="rounded-2xl border border-cinema-border/70 bg-cinema-surface/60 hover:bg-cinema-surface hover:border-cinema-accent/40 transition-all duration-200 p-5 sm:p-6 shadow-md hover:shadow-lg">
                                    <div class="flex flex-wrap items-start justify-between gap-2">
                                        <h3 class="font-display text-base font-semibold text-cinema-text">
                                            {{ $edu['degree'] ?? '' }}
                                        </h3>
                                        <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full bg-cinema-elevated text-cinema-muted border border-cinema-border/60">
                                            {{ $edu['period'] ?? '' }}
                                        </span>
                                    </div>
                                    <p class="text-xs font-medium text-cinema-accent mt-1 flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-cinema-accent"></span>
                                        {{ $edu['institution'] ?? '' }}
                                    </p>
                                    @if (!empty($edu['description']))
                                        <p class="text-sm text-cinema-muted mt-2.5 leading-relaxed">
                                            {{ $edu['description'] }}
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>

        {{-- ───────────────────────────────────────────────────────────────── --}}
        {{-- SECTION 3 : CERTIFICATIONS & JUSTIFICATIFS OFFICIELS              --}}
        {{-- ───────────────────────────────────────────────────────────────── --}}
        @if (!empty($about?->certifications))
            <div class="reveal mt-20 pt-16 border-t border-cinema-border/60">
                <x-section-title
                    eyebrow="Distinctions"
                    title="Certifications & Justificatifs officiels"
                    subtitle="Attestations délivrées validant les compétences en design, montage et gestion numérique."
                />

                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-5">
                    @foreach ($about->certifications as $cert)
                        <div class="rounded-2xl border border-cinema-border/70 bg-cinema-surface/70 hover:bg-cinema-surface hover:border-cinema-accent/50 transition-all duration-200 p-6 flex flex-col justify-between shadow-md">
                            <div>
                                <div class="flex items-center justify-between gap-2 mb-4">
                                    <div class="w-10 h-10 rounded-xl bg-cinema-accent/10 border border-cinema-accent/30 text-cinema-accent flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                        </svg>
                                    </div>
                                    @if (!empty($cert['date']))
                                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-cinema-elevated text-cinema-accent border border-cinema-border/50">
                                            {{ $cert['date'] }}
                                        </span>
                                    @endif
                                </div>

                                <h3 class="font-display text-base font-semibold text-cinema-text leading-snug">
                                    {{ $cert['title'] ?? '' }}
                                </h3>

                                <p class="text-xs font-semibold text-cinema-accent mt-2">
                                    {{ $cert['issuer'] ?? '' }}
                                </p>

                                @if (!empty($cert['description']))
                                    <p class="text-xs text-cinema-muted mt-2.5 leading-relaxed">
                                        {{ $cert['description'] }}
                                    </p>
                                @endif
                            </div>

                            <div class="mt-5 pt-4 border-t border-cinema-border/50 flex items-center gap-1.5 text-[11px] text-cinema-muted">
                                <svg class="w-3.5 h-3.5 text-cinema-accent" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                <span>Justificatif officiel disponible dans le CV</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- ───────────────────────────────────────────────────────────────── --}}
        {{-- SECTION 4 : COMPÉTENCES & OUTILS (Grille avec jauges calibrées)  --}}
        {{-- ───────────────────────────────────────────────────────────────── --}}
        <div class="reveal mt-20 pt-16 border-t border-cinema-border/60">
            <x-section-title
                eyebrow="Compétences"
                title="Savoir-faire & Outils maîtrisés"
                subtitle="Technologies et techniques mobilisées pour chaque univers de travail."
            />

            <div class="mt-12 space-y-12">
                @foreach ($specialties as $specialty)
                    <div class="rounded-3xl border border-cinema-border bg-cinema-surface/70 p-6 sm:p-10 shadow-xl">
                        <div class="flex items-center justify-between gap-4 border-b border-cinema-border/60 pb-5 mb-8">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-cinema-accent/15 text-cinema-accent border border-cinema-accent/30">
                                    {{ $specialty->name }}
                                </span>
                            </div>
                            <span class="text-xs text-cinema-muted">Niveaux de maîtrise évalués</span>
                        </div>

                        {{-- Grille de Skills : 2 colonnes mobile / 3 colonnes desktop avec barres de progression --}}
                        <div class="mb-8">
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                                @foreach ($specialty->skills as $skill)
                                    <x-skill-card :skill="$skill" />
                                @endforeach
                            </div>
                        </div>

                        {{-- Outils en pills séparés en dessous --}}
                        @if ($specialty->tools->isNotEmpty())
                            <div class="pt-6 border-t border-cinema-border/60">
                                <span class="text-xs uppercase tracking-wider text-cinema-muted font-semibold block mb-3">
                                    Outils & technologies mobilisés
                                </span>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($specialty->tools as $tool)
                                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-medium bg-cinema-elevated text-cinema-text border border-cinema-border/60 shadow-sm hover:border-cinema-accent/40 transition-colors">
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

        {{-- ───────────────────────────────────────────────────────────────── --}}
        {{-- SECTION 5 : BANDEAU D'APPEL À L'ACTION (CTA FINAL)               --}}
        {{-- ───────────────────────────────────────────────────────────────── --}}
        <div class="reveal mt-20 pt-16 border-t border-cinema-border/60">
            <div class="rounded-3xl border border-cinema-accent/30 bg-gradient-to-br from-cinema-surface via-cinema-elevated to-cinema-surface p-8 sm:p-12 text-center relative overflow-hidden shadow-2xl">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(212,168,71,0.08)_0%,transparent_70%)] pointer-events-none"></div>

                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-cinema-accent/10 text-cinema-accent border border-cinema-accent/20 mb-4">
                    Collaboration & Projets
                </span>

                <h2 class="font-display text-2xl sm:text-3xl lg:text-4xl font-bold text-cinema-text max-w-2xl mx-auto">
                    Prêt à donner vie à vos projets audiovisuels et digitaux ?
                </h2>

                <p class="mt-4 text-sm sm:text-base text-cinema-muted max-w-xl mx-auto leading-relaxed">
                    Vidéaste, monteur vidéo ou projets applicatifs — je mets ma créativité, mes compétences techniques et ma rigueur au service de vos objectifs.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('contact.create') }}"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-full font-semibold text-sm transition-all duration-200 min-h-[48px] px-8 bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h shadow-lg hover:shadow-[0_0_25px_rgba(212,168,71,0.35)]">
                        <span>Lancer une discussion</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>

                    <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $whatsappMsg }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-full font-semibold text-sm transition-all duration-200 min-h-[48px] px-8 bg-cinema-surface border border-cinema-border text-cinema-text hover:border-emerald-500/50 hover:text-emerald-400">
                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                        <span>WhatsApp direct</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-public-layout>
