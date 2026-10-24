@props([
    'specialty',
    'active' => false,
])

<button type="button"
        {{ $attributes->merge([
            'class' => 'inline-flex items-center gap-2.5 px-5 py-3 rounded-full text-sm font-medium whitespace-nowrap transition-all duration-200 select-none min-h-[44px]',
        ]) }}>
    @if ($specialty->icon === 'video-camera')
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9A2.25 2.25 0 0 0 13.5 5.25h-9A2.25 2.25 0 0 0 2.25 7.5v9A2.25 2.25 0 0 0 4.5 18.75Z" />
        </svg>
    @elseif ($specialty->icon === 'code-bracket')
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
        </svg>
    @else
        <span class="w-2 h-2 rounded-full bg-cinema-accent"></span>
    @endif
    <span>{{ $specialty->name }}</span>
</button>
