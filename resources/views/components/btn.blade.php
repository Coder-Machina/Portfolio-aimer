@props([
    'variant' => 'primary', // primary | secondary | ghost
    'href' => null,
    'type' => 'button',
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 rounded-full font-medium text-sm transition-all duration-200 min-h-[44px] px-6 select-none focus:outline-none focus:ring-2 focus:ring-cinema-accent focus:ring-offset-2 focus:ring-offset-cinema-bg disabled:opacity-50 disabled:pointer-events-none active:scale-[0.98]';

    $variants = [
        'primary' => 'bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h shadow-sm hover:shadow-[0_4px_20px_rgba(212,168,71,0.25)]',
        'secondary' => 'bg-cinema-surface border border-cinema-border text-cinema-text hover:bg-cinema-elevated hover:border-cinema-accent/40',
        'ghost' => 'text-cinema-muted hover:text-cinema-text hover:bg-cinema-surface/60',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
