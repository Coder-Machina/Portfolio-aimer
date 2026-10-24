@props([
    'skill',
])

@php
    $name = is_string($skill) ? $skill : ($skill->name ?? '');
    $rawLevel = is_string($skill) ? 'intermédiaire' : ($skill->level ?? 'intermédiaire');
    $normalizedLevel = mb_strtolower((string) $rawLevel);

    // [WHY] Exact prompt calibration: Expert = 100% gold, Avancé = 75% attenuated gold, Intermédiaire = 50% gray, Débutant = 25% dark gray
    $config = match ($normalizedLevel) {
        'expert' => [
            'width' => '100%',
            'barClass' => 'bg-cinema-accent shadow-[0_0_10px_rgba(212,168,71,0.45)]',
            'label' => 'Expert (100%)',
            'labelClass' => 'text-cinema-accent font-semibold',
        ],
        'avancé', 'avance' => [
            'width' => '75%',
            'barClass' => 'bg-[#D4A847]/75',
            'label' => 'Avancé (75%)',
            'labelClass' => 'text-[#D4A847]/85 font-medium',
        ],
        'intermédiaire', 'intermediaire' => [
            'width' => '50%',
            'barClass' => 'bg-[#909090]',
            'label' => 'Intermédiaire (50%)',
            'labelClass' => 'text-cinema-muted font-normal',
        ],
        default => [
            'width' => '25%',
            'barClass' => 'bg-[#505050]',
            'label' => 'Débutant (25%)',
            'labelClass' => 'text-cinema-muted/70 font-normal',
        ],
    };
@endphp

<div class="rounded-2xl border border-cinema-border bg-cinema-surface p-4 sm:p-5 flex flex-col justify-between hover:border-cinema-accent/35 transition-all duration-200 shadow-sm">
    <div class="flex items-start justify-between gap-2">
        <h4 class="font-display font-semibold text-cinema-text text-sm sm:text-base leading-snug line-clamp-1">
            {{ $name }}
        </h4>
        <span class="text-[11px] shrink-0 uppercase tracking-wider {{ $config['labelClass'] }}">
            {{ $config['label'] }}
        </span>
    </div>

    {{-- Progress bar track --}}
    <div class="mt-4">
        <div class="w-full h-2 rounded-full bg-cinema-elevated overflow-hidden border border-cinema-border/50">
            <div class="h-full rounded-full transition-all duration-700 ease-out {{ $config['barClass'] }}"
                 style="width: {{ $config['width'] }};"></div>
        </div>
    </div>
</div>
