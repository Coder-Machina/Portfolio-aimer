<x-public-layout
    title="Services & Tarifs — Montage Vidéo & Création de Contenu"
    description="Prestations de montage vidéo, clipping pour réseaux sociaux, production courte et créations animées par IA."
>
    <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
        {{-- Section Header --}}
        <div class="reveal max-w-3xl">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-cinema-accent">Offres & Prestations</p>
            <h1 class="mt-2 font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-cinema-text">
                Mes Services
            </h1>
            <p class="mt-4 text-base sm:text-lg text-cinema-muted">
                Des prestations claires et professionnelles, adaptées aux créateurs de contenu, marques de mode, académies et entreprises ambitieuses.
            </p>
        </div>

        {{-- Services Grid --}}
        <div class="reveal mt-14 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($services as $service)
                <div class="flex flex-col justify-between rounded-3xl border border-cinema-border bg-cinema-surface p-8 sm:p-10 hover:border-cinema-accent/40 transition-all duration-200">
                    <div>
                        <div class="flex items-center justify-between gap-4 mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-cinema-accent/10 border border-cinema-accent/25 flex items-center justify-center text-cinema-accent">
                                {{-- Heroicons based on service ordering --}}
                                @if ($loop->index === 0)
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9A2.25 2.25 0 0 0 13.5 5.25h-9A2.25 2.25 0 0 0 2.25 7.5v9A2.25 2.25 0 0 0 4.5 18.75Z" />
                                    </svg>
                                @elseif ($loop->index === 1)
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                    </svg>
                                @elseif ($loop->index === 2)
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m7.841 15.84 8.58-5.72a.75.75 0 0 0 0-1.24l-8.58-5.72A.75.75 0 0 0 6.75 3.75v12a.75.75 0 0 0 1.091.664M18.75 4.5v15" />
                                    </svg>
                                @else
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                    </svg>
                                @endif
                            </div>

                            @if ($service->price)
                                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-cinema-elevated text-cinema-accent border border-cinema-accent/30">
                                    {{ $service->price }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs text-cinema-muted bg-cinema-elevated">
                                    Sur devis
                                </span>
                            @endif
                        </div>

                        <h2 class="font-display text-2xl font-bold text-cinema-text">
                            {{ $service->title }}
                        </h2>

                        <p class="mt-4 text-base text-cinema-muted leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>

                    <div class="mt-8 pt-6 border-t border-cinema-border/60 flex items-center justify-between">
                        <span class="text-xs text-cinema-muted">Livraison rapide & retouches incluses</span>
                        <x-btn href="{{ route('contact.create') }}" variant="secondary">
                            <span>Demander ce service</span>
                        </x-btn>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Bottom CTA --}}
        <div class="reveal mt-16 rounded-3xl border border-cinema-accent/30 bg-gradient-to-r from-cinema-surface via-cinema-elevated to-cinema-surface p-8 sm:p-12 text-center">
            <h3 class="font-display text-2xl sm:text-3xl font-bold text-cinema-text">
                Un besoin spécifique ou un projet d'envergure ?
            </h3>
            <p class="mt-3 max-w-xl mx-auto text-cinema-muted">
                Je propose également des forfaits mensuels pour la production régulière de vos contenus de marque.
            </p>
            <div class="mt-8">
                <x-btn href="{{ route('contact.create') }}" variant="primary">
                    <span>Discuter de votre projet</span>
                </x-btn>
            </div>
        </div>
    </div>
</x-public-layout>
