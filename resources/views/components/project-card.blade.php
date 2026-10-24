@props([
    'project',
])

@php
    $specialtySlug = $project->specialty?->slug ?? 'general';
    $detailUrl = route('portfolio.project', ['specialty' => $specialtySlug, 'project' => $project->slug]);
@endphp

<article class="project-card group relative flex flex-col overflow-hidden rounded-2xl border border-cinema-border bg-cinema-surface">
    {{-- Thumbnail / Media Preview --}}
    <div class="relative aspect-[16/10] w-full overflow-hidden bg-cinema-elevated">
        @if ($project->thumbnail && file_exists(public_path('storage/' . $project->thumbnail)))
            <img src="{{ asset('storage/' . $project->thumbnail) }}"
                 alt="{{ $project->title }}"
                 loading="lazy"
                 class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
        @else
            {{-- [WHY] Elegant fallback background when thumbnail is not yet uploaded --}}
            <div class="relative h-full w-full flex flex-col items-center justify-center p-6 bg-gradient-to-br from-cinema-surface via-cinema-elevated to-cinema-bg border-b border-cinema-border/50">
                <div class="w-12 h-12 rounded-full border border-cinema-accent/30 bg-cinema-accent/10 flex items-center justify-center text-cinema-accent mb-3">
                    @if ($project->tiktok_url)
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298 0 .59.046.87.135V9.4a6.33 6.33 0 0 0-.87-.06 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 9.07 5.72 6.33 6.33 0 0 0 3.61-5.72V8.75a8.16 8.16 0 0 0 4.77 1.51V6.8a4.88 4.88 0 0 1-1-.11z"/></svg>
                    @else
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9A2.25 2.25 0 0 0 13.5 5.25h-9A2.25 2.25 0 0 0 2.25 7.5v9A2.25 2.25 0 0 0 4.5 18.75Z"/></svg>
                    @endif
                </div>
                <span class="text-xs uppercase tracking-wider text-cinema-muted font-medium">{{ $project->specialty?->name ?? 'Projet' }}</span>
            </div>
        @endif

        {{-- Domain Tag on Top Right --}}
        @if ($project->specialty)
            <div class="absolute top-3 left-3 z-10">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-cinema-bg/85 backdrop-blur-md text-cinema-accent border border-cinema-accent/30">
                    {{ $project->specialty->name }}
                </span>
            </div>
        @endif

        {{-- Subtle Hover Overlay --}}
        <div class="card-overlay absolute inset-0 bg-gradient-to-t from-cinema-bg via-cinema-bg/40 to-transparent flex items-end p-4"></div>
    </div>

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-6">
        <h3 class="font-display text-lg font-bold text-cinema-text group-hover:text-cinema-accent transition-colors line-clamp-1">
            {{ $project->title }}
        </h3>

        <p class="mt-2 text-sm text-cinema-muted line-clamp-2 leading-relaxed">
            {{ $project->description }}
        </p>

        {{-- Tags --}}
        @if (!empty($project->tags) && is_array($project->tags))
            <div class="mt-4 flex flex-wrap gap-1.5">
                @foreach (array_slice($project->tags, 0, 3) as $tag)
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] bg-cinema-elevated text-cinema-muted">
                        #{{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif

        {{-- Actions based on strict prompt rules: direct links + detail view --}}
        <div class="mt-6 pt-4 border-t border-cinema-border/60 flex items-center justify-between gap-2">
            <div class="flex flex-wrap items-center gap-2">
                @if ($project->project_url)
                    <a href="{{ $project->project_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       title="Consulter le projet en direct"
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h transition-all min-h-[44px]">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"/></svg>
                        <span>Voir le projet</span>
                    </a>
                @elseif ($project->tiktok_url)
                    <a href="{{ $project->tiktok_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h transition-all min-h-[44px]">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298 0 .59.046.87.135V9.4a6.33 6.33 0 0 0-.87-.06 6.34 6.34 0 0 0 9.07 5.72 6.33 6.33 0 0 0 3.61-5.72V8.75a8.16 8.16 0 0 0 4.77 1.51V6.8a4.88 4.88 0 0 1-1-.11z"/></svg>
                        <span>TikTok</span>
                    </a>
                @else
                    <a href="{{ $detailUrl }}"
                       class="inline-flex items-center gap-2 text-xs font-semibold text-cinema-accent hover:text-cinema-accent-h transition-colors min-h-[44px]">
                        <span>Découvrir</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                @endif
            </div>

            <a href="{{ $detailUrl }}"
               class="inline-flex items-center gap-1 text-xs text-cinema-muted hover:text-cinema-text transition-colors py-2 px-2 shrink-0 min-h-[44px]"
               title="Détails complets du projet">
                <span>Détails</span>
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
            </a>
        </div>
    </div>
</article>
