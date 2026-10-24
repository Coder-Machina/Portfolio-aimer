@props([
    'variant' => 'default',
    'level' => null,
])

@php
    $resolvedVariant = $level ? match (mb_strtolower((string) $level)) {
        'expert' => 'expert',
        'avancé', 'avance' => 'advanced',
        'intermédiaire', 'intermediaire' => 'intermediate',
        default => 'beginner',
    } : $variant;

    $variants = [
        'default' => 'bg-cinema-surface border border-cinema-border text-cinema-muted',
        'domain' => 'bg-cinema-accent/15 border border-cinema-accent/30 text-cinema-accent font-semibold',
        'tag' => 'bg-cinema-elevated text-cinema-text text-xs',
        'beginner' => 'bg-cinema-surface border border-cinema-border text-cinema-muted',
        'intermediate' => 'bg-cinema-elevated border border-cinema-border/70 text-cinema-text',
        'advanced' => 'bg-cinema-accent/10 border border-cinema-accent/25 text-cinema-accent',
        'expert' => 'bg-cinema-accent text-cinema-bg font-semibold shadow-sm',
    ];

    $classes = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium tracking-wide ' . ($variants[$resolvedVariant] ?? $variants['default']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
