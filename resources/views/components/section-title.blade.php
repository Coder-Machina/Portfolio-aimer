@props([
    'title',
    'subtitle' => null,
    'eyebrow' => null,
    'align' => 'left', // left | center
])

@php
    $alignClasses = $align === 'center' ? 'text-center mx-auto items-center' : 'text-left items-start';
@endphp

<div {{ $attributes->merge(['class' => 'reveal flex flex-col ' . $alignClasses]) }}>
    @if ($eyebrow)
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-cinema-accent">
            {{ $eyebrow }}
        </p>
    @endif

    <h2 class="mt-2 font-display text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight text-cinema-text">
        {{ $title }}
    </h2>

    @if ($subtitle)
        <p class="mt-3 max-w-2xl text-base sm:text-lg text-cinema-muted leading-relaxed">
            {{ $subtitle }}
        </p>
    @endif
</div>
