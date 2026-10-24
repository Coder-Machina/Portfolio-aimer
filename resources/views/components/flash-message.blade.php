@if (session('success'))
    <div x-data="{ show: true }"
         x-show="show"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="mb-6 rounded-2xl border border-cinema-accent/40 bg-cinema-surface/90 p-4 text-cinema-text backdrop-blur shadow-lg flex items-start justify-between gap-4"
         role="alert">
        <div class="flex items-center gap-3">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-cinema-accent text-cinema-bg">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
            </div>
            <div>
                <p class="font-display font-semibold text-cinema-text">Message envoyé avec succès</p>
                <p class="text-sm text-cinema-muted mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
        <button type="button" @click="show = false" class="text-cinema-muted hover:text-cinema-text p-1" aria-label="Fermer la notification">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif

@if (session('error'))
    <div x-data="{ show: true }"
         x-show="show"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="mb-6 rounded-2xl border border-red-500/40 bg-cinema-surface/90 p-4 text-cinema-text backdrop-blur shadow-lg flex items-start justify-between gap-4"
         role="alert">
        <div class="flex items-center gap-3">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-500 text-white">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 6.75h.008v.008H12v-.008Z" />
                </svg>
            </div>
            <div>
                <p class="font-display font-semibold text-cinema-text">Une erreur est survenue</p>
                <p class="text-sm text-cinema-muted mt-0.5">{{ session('error') }}</p>
            </div>
        </div>
        <button type="button" @click="show = false" class="text-cinema-muted hover:text-cinema-text p-1" aria-label="Fermer la notification">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif
