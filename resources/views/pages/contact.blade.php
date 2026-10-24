<x-public-layout
    title="Contact — Démarrer un projet vidéo"
    description="Contactez AKODO Aimé D. Yves pour vos projets de montage vidéo, création de contenu ou développement à Cotonou."
>
    <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
        {{-- Section Header --}}
        <div class="reveal max-w-2xl">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-cinema-accent">Contact direct</p>
            <h1 class="mt-2 font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-cinema-text">
                Travaillons ensemble
            </h1>
            <p class="mt-4 text-base sm:text-lg text-cinema-muted">
                Une idée de vidéo, un projet de marque ou une demande de devis ? Remplissez ce formulaire ou contactez-moi directement sur WhatsApp.
            </p>
        </div>

        <div class="mt-12 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            {{-- Contact Form Column --}}
            <div class="lg:col-span-7 reveal">
                <x-flash-message />

                <div class="rounded-3xl border border-cinema-border bg-cinema-surface p-8 sm:p-10 shadow-xl">
                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf

                        {{-- Nom --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-cinema-text mb-2">
                                Votre nom ou entreprise <span class="text-cinema-accent">*</span>
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                                   maxlength="100"
                                   placeholder="Ex : Supreme Academy / Marc Dubois"
                                   class="w-full rounded-xl border border-cinema-border bg-cinema-elevated px-4 py-3 text-cinema-text placeholder-cinema-muted/60 focus:border-cinema-accent focus:outline-none focus:ring-1 focus:ring-cinema-accent text-sm transition-colors @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-cinema-text mb-2">
                                Votre adresse email <span class="text-cinema-accent">*</span>
                            </label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   maxlength="150"
                                   placeholder="nom@exemple.com"
                                   class="w-full rounded-xl border border-cinema-border bg-cinema-elevated px-4 py-3 text-cinema-text placeholder-cinema-muted/60 focus:border-cinema-accent focus:outline-none focus:ring-1 focus:ring-cinema-accent text-sm transition-colors @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Sujet --}}
                        <div>
                            <label for="subject" class="block text-sm font-medium text-cinema-text mb-2">
                                Sujet de votre demande <span class="text-cinema-accent">*</span>
                            </label>
                            <input type="text"
                                   id="subject"
                                   name="subject"
                                   value="{{ old('subject') }}"
                                   required
                                   maxlength="200"
                                   placeholder="Ex : Montage d'une série TikTok / Devis clipping"
                                   class="w-full rounded-xl border border-cinema-border bg-cinema-elevated px-4 py-3 text-cinema-text placeholder-cinema-muted/60 focus:border-cinema-accent focus:outline-none focus:ring-1 focus:ring-cinema-accent text-sm transition-colors @error('subject') border-red-500 @enderror">
                            @error('subject')
                                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Message --}}
                        <div>
                            <label for="message" class="block text-sm font-medium text-cinema-text mb-2">
                                Votre message <span class="text-cinema-accent">*</span>
                            </label>
                            <textarea id="message"
                                      name="message"
                                      rows="5"
                                      required
                                      maxlength="5000"
                                      placeholder="Présentez votre projet, vos délais et vos besoins spécifiques..."
                                      class="w-full rounded-xl border border-cinema-border bg-cinema-elevated px-4 py-3 text-cinema-text placeholder-cinema-muted/60 focus:border-cinema-accent focus:outline-none focus:ring-1 focus:ring-cinema-accent text-sm transition-colors @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-full font-medium text-sm transition-all duration-200 min-h-[48px] px-8 bg-cinema-accent text-cinema-bg hover:bg-cinema-accent-h shadow-lg hover:shadow-[0_4px_20px_rgba(212,168,71,0.25)] select-none">
                                <span>Envoyer le message</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Coordinates / Quick Contact Column --}}
            <div class="lg:col-span-5 reveal space-y-6">
                {{-- Quick Contact Card --}}
                <div class="rounded-3xl border border-cinema-border bg-cinema-surface p-8">
                    <h2 class="font-display text-xl font-bold text-cinema-text mb-6">
                        Coordonnées directes
                    </h2>

                    <div class="space-y-5 text-sm">
                        {{-- Email --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-cinema-accent/10 border border-cinema-accent/30 flex items-center justify-center text-cinema-accent shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wider text-cinema-muted">Email</p>
                                <a href="mailto:{{ setting('contact_email', 'aimeakd6@gmail.com') }}" class="font-medium text-cinema-text hover:text-cinema-accent transition-colors">
                                    {{ setting('contact_email', 'aimeakd6@gmail.com') }}
                                </a>
                            </div>
                        </div>

                        {{-- Téléphone --}}
                        @if (setting('phone'))
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-cinema-accent/10 border border-cinema-accent/30 flex items-center justify-center text-cinema-accent shrink-0">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs uppercase tracking-wider text-cinema-muted">Téléphone</p>
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', (string) setting('phone')) }}" class="font-medium text-cinema-text hover:text-cinema-accent transition-colors">
                                        {{ setting('phone') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        {{-- WhatsApp direct link --}}
                        @if (setting('whatsapp_number'))
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#25D366]/15 border border-[#25D366]/30 flex items-center justify-center text-[#25D366] shrink-0">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967..."/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs uppercase tracking-wider text-cinema-muted">WhatsApp</p>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', (string) setting('whatsapp_number')) }}?text=Bonjour+Aim%C3%A9%2C+je+vous+contacte+depuis+votre+portfolio."
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="font-medium text-cinema-text hover:text-[#25D366] transition-colors">
                                        Discussion instantanée (+229)
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Réseaux Sociaux Card --}}
                @php
                    $socialLinks = setting('social_links');
                @endphp
                @if (!empty($socialLinks) && is_array($socialLinks))
                    <div class="rounded-3xl border border-cinema-border bg-cinema-surface p-8">
                        <h2 class="font-display text-lg font-bold text-cinema-text mb-4">
                            Retrouvez-moi sur les réseaux
                        </h2>
                        <div class="flex flex-wrap gap-2.5">
                            @foreach ($socialLinks as $link)
                                <a href="{{ $link['url'] }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full text-xs font-medium bg-cinema-elevated text-cinema-text border border-cinema-border hover:border-cinema-accent/40 hover:text-cinema-accent transition-colors">
                                    <span>{{ $link['platform'] }}</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                    </svg>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-public-layout>
