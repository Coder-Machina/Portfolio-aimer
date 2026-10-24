<x-public-layout
    :title="$specialty->name . ' — Portfolio'"
    :description="$specialty->description"
>
    <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8 py-16 sm:py-20"
         x-data="{ activeTag: 'all' }">

        {{-- Return to Portfolio --}}
        <div class="reveal mb-8">
            <a href="{{ route('portfolio.index') }}"
               class="inline-flex items-center gap-2 text-sm text-cinema-muted hover:text-cinema-accent transition-colors font-medium">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <span>Retour au portfolio complet</span>
            </a>
        </div>

        {{-- Domain Header Banner --}}
        <div class="reveal rounded-3xl border border-cinema-border bg-cinema-surface/70 p-8 sm:p-12 relative overflow-hidden">
            <div class="pointer-events-none absolute -top-24 -right-24 w-80 h-80 bg-cinema-accent/10 blur-[90px] rounded-full" aria-hidden="true"></div>

            <div class="relative max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-cinema-accent/30 bg-cinema-accent/10 text-xs font-semibold text-cinema-accent">
                    <span>Domaine d'expertise</span>
                </div>

                <h1 class="mt-4 font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-cinema-text">
                    {{ $specialty->name }}
                </h1>

                <p class="mt-4 text-base sm:text-lg text-cinema-muted leading-relaxed">
                    {{ $specialty->description }}
                </p>

            </div>
        </div>

        {{-- Skills Section: 2 columns mobile / 3 columns desktop with progress bars --}}
        @if ($specialty->skills->isNotEmpty())
            <div class="reveal mt-12">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display text-xl font-bold text-cinema-text">
                        Compétences & savoir-faire
                    </h2>
                    <span class="text-xs text-cinema-muted">Niveau de maîtrise</span>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                    @foreach ($specialty->skills as $skill)
                        <x-skill-card :skill="$skill" />
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Tools Pills separated below skills --}}
        @if ($specialty->tools->isNotEmpty())
            <div class="reveal mt-8 p-6 rounded-2xl border border-cinema-border bg-cinema-surface/50">
                <span class="text-xs uppercase tracking-wider text-cinema-accent font-semibold block mb-3">Outils & technologies maîtrisés</span>
                <div class="flex flex-wrap gap-2.5">
                    @foreach ($specialty->tools as $tool)
                        <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-medium bg-cinema-elevated text-cinema-text border border-cinema-border/70 shadow-sm">
                            {{ $tool->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Filter Tags --}}
        @php
            $allTags = $specialty->projects->flatMap(fn ($p) => $p->tags ?? [])->unique()->values();
        @endphp
        @if ($allTags->isNotEmpty())
            <div class="reveal mt-10 flex items-center gap-2 overflow-x-auto scrollbar-none pb-2">
                <span class="text-xs text-cinema-muted whitespace-nowrap mr-2">Filtrer :</span>
                <button type="button"
                        @click="activeTag = 'all'"
                        :class="activeTag === 'all' ? 'bg-cinema-accent text-cinema-bg font-medium' : 'bg-cinema-surface text-cinema-muted hover:text-cinema-text'"
                        class="px-3.5 py-1 rounded-full text-xs transition-colors whitespace-nowrap">
                    Tous
                </button>
                @foreach ($allTags as $tag)
                    <button type="button"
                            @click="activeTag = '{{ $tag }}'"
                            :class="activeTag === '{{ $tag }}' ? 'bg-cinema-accent text-cinema-bg font-medium' : 'bg-cinema-surface text-cinema-muted hover:text-cinema-text'"
                            class="px-3.5 py-1 rounded-full text-xs transition-colors whitespace-nowrap">
                        #{{ $tag }}
                    </button>
                @endforeach
            </div>
        @endif

        {{-- Projects Grid --}}
        <div class="reveal mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @forelse ($specialty->projects as $project)
                <div x-show="activeTag === 'all' || {{ json_encode($project->tags ?? []) }}.includes(activeTag)"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100">
                    <x-project-card :project="$project" />
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-cinema-border bg-cinema-surface p-12 text-center text-cinema-muted">
                    Aucun projet répertorié dans ce domaine actuellement.
                </div>
            @endforelse
        </div>
    </div>
</x-public-layout>
