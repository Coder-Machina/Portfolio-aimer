<x-public-layout
    title="Portfolio — Mes réalisations par domaine"
    description="Découvrez l'ensemble de mes projets vidéo, montage court format et développements informatiques."
>
    <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8 py-16 sm:py-20"
         x-data="{
            activeTab: '{{ $specialties->first()?->slug ?? '' }}',
            activeTag: 'all',
         }">

        {{-- Header Section --}}
        <div class="reveal max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-cinema-accent">Réalisations</p>
            <h1 class="mt-2 font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-cinema-text">
                Mon Portfolio
            </h1>
            <p class="mt-4 text-base sm:text-lg text-cinema-muted">
                Explorez mes réalisations organisées par domaine d'expertise. Cliquez sur un onglet pour filtrer projets, compétences et outils.
            </p>
        </div>

        {{-- Horizontal Scrollable Tabs --}}
        <div class="reveal mt-10 border-b border-cinema-border/70 pb-4 overflow-x-auto scrollbar-none flex gap-2.5 sm:gap-3">
            @foreach ($specialties as $specialty)
                <button type="button"
                        @click="activeTab = '{{ $specialty->slug }}'; activeTag = 'all';"
                        :class="activeTab === '{{ $specialty->slug }}'
                            ? 'bg-cinema-accent text-cinema-bg shadow-sm font-semibold'
                            : 'bg-cinema-surface border border-cinema-border text-cinema-muted hover:text-cinema-text hover:bg-cinema-elevated'"
                        class="inline-flex items-center gap-2.5 px-6 py-3 rounded-full text-sm whitespace-nowrap transition-all duration-200 min-h-[44px] select-none">
                    @if ($specialty->icon === 'video-camera')
                        <svg class="w-4 h-4 fill-none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9A2.25 2.25 0 0 0 13.5 5.25h-9A2.25 2.25 0 0 0 2.25 7.5v9A2.25 2.25 0 0 0 4.5 18.75Z" />
                        </svg>
                    @elseif ($specialty->icon === 'code-bracket')
                        <svg class="w-4 h-4 fill-none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                        </svg>
                    @endif
                    <span>{{ $specialty->name }}</span>
                    <span class="ml-1 text-xs opacity-75">({{ $specialty->projects->count() }})</span>
                </button>
            @endforeach
        </div>

        {{-- Panels per Specialty --}}
        @foreach ($specialties as $specialty)
            <div x-show="activeTab === '{{ $specialty->slug }}'"
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="mt-10">

                {{-- Domain Intro card --}}
                <div class="rounded-2xl border border-cinema-border bg-cinema-surface/70 p-6 sm:p-8">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="font-display text-xl sm:text-2xl font-bold text-cinema-text">
                            {{ $specialty->name }}
                        </h2>
                        <a href="{{ route('portfolio.specialty', $specialty) }}"
                           class="text-xs text-cinema-accent hover:text-cinema-accent-h flex items-center gap-1 font-medium"
                           title="Lien permanent vers ce domaine">
                            <span>Page dédiée</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>
                    </div>
                    <p class="mt-3 text-sm sm:text-base text-cinema-muted leading-relaxed max-w-3xl">
                        {{ $specialty->description }}
                    </p>
                </div>

                {{-- Skills Grid: 2 columns mobile / 3 columns desktop with progress bars --}}
                @if ($specialty->skills->isNotEmpty())
                    <div class="mt-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xs uppercase tracking-[0.15em] text-cinema-accent font-semibold">
                                Compétences évaluées
                            </h3>
                            <span class="text-xs text-cinema-muted">Niveau de maîtrise</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                            @foreach ($specialty->skills as $skill)
                                <x-skill-card :skill="$skill" />
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Tools in separate pills below skills --}}
                @if ($specialty->tools->isNotEmpty())
                    <div class="mt-6 p-4 rounded-xl border border-cinema-border/50 bg-cinema-surface/40 flex flex-wrap items-center gap-2">
                        <span class="text-xs uppercase tracking-wider text-cinema-muted font-semibold mr-1">Outils maîtrisés :</span>
                        @foreach ($specialty->tools as $tool)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-cinema-elevated text-cinema-text border border-cinema-border/60">
                                {{ $tool->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                {{-- Tag Filter (Alpine.js) --}}
                @php
                    $allTags = $specialty->projects->flatMap(fn ($p) => $p->tags ?? [])->unique()->values();
                @endphp
                @if ($allTags->isNotEmpty())
                    <div class="mt-8 flex items-center gap-2 overflow-x-auto scrollbar-none pb-2">
                        <span class="text-xs text-cinema-muted whitespace-nowrap mr-2">Filtrer par tag :</span>
                        <button type="button"
                                @click="activeTag = 'all'"
                                :class="activeTag === 'all' ? 'bg-cinema-accent text-cinema-bg' : 'bg-cinema-surface text-cinema-muted hover:text-cinema-text'"
                                class="px-3 py-1 rounded-full text-xs font-medium transition-colors whitespace-nowrap">
                            Tous
                        </button>
                        @foreach ($allTags as $tag)
                            <button type="button"
                                    @click="activeTag = '{{ $tag }}'"
                                    :class="activeTag === '{{ $tag }}' ? 'bg-cinema-accent text-cinema-bg' : 'bg-cinema-surface text-cinema-muted hover:text-cinema-text'"
                                    class="px-3 py-1 rounded-full text-xs font-medium transition-colors whitespace-nowrap">
                                #{{ $tag }}
                            </button>
                        @endforeach
                    </div>
                @endif

                {{-- Projects Grid --}}
                <div class="reveal mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @forelse ($specialty->projects as $project)
                        <div x-show="activeTag === 'all' || {{ json_encode($project->tags ?? []) }}.includes(activeTag)"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100">
                            <x-project-card :project="$project" />
                        </div>
                    @empty
                        <div class="col-span-full rounded-2xl border border-cinema-border bg-cinema-surface p-12 text-center text-cinema-muted">
                            Aucun projet disponible dans ce domaine pour le moment.
                        </div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</x-public-layout>
