@extends('layouts.app')
@section('title', 'Dashboard · CodeBridge')

@section('content')

<section class="py-16 bg-slate-50 dark:bg-slate-900 min-h-screen">
    <div class="max-w-5xl mx-auto px-6">

        @php $user = Auth::user(); @endphp

        {{-- Bienvenida --}}
        <div class="mb-12 flex items-start justify-between">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-semibold tracking-widest uppercase px-3 py-1.5 rounded-full mb-4
                    @if($user->isAdmin()) bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-400
                    @elseif($user->isDeveloper()) bg-teal-100 dark:bg-teal-900/30 text-teal-700 dark:text-teal-400
                    @else bg-brand-100 dark:bg-brand-900/30 text-brand-700 dark:text-brand-400 @endif">
                    <span class="w-1.5 h-1.5 rounded-full
                        @if($user->isAdmin()) bg-purple-500
                        @elseif($user->isDeveloper()) bg-teal-500
                        @else bg-brand-500 @endif"></span>
                    @if($user->isAdmin()) Administrador
                    @elseif($user->isDeveloper()) Desarrollador
                    @else Cliente @endif
                </div>
                <h1 class="font-display text-4xl font-extrabold text-ink dark:text-white">
                    Hola, {{ $user->name }}
                </h1>
                <p class="text-slate-500 dark:text-slate-400 mt-2">
                    @if($user->isAdmin()) Desde acá podés gestionar todo el contenido de CodeBridge.
                    @elseif($user->isDeveloper()) Desde acá podés ver y editar tu perfil en CodeBridge.
                    @else Desde acá podés ver el estado de tus proyectos con CodeBridge.
                    @endif
                </p>
            </div>
        </div>

        {{-- ADMIN --}}
        @if($user->isAdmin())
        <div class="grid md:grid-cols-3 gap-4">
            <a href="{{ route('admin.developers.index') }}"
               class="group bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-md transition-all">
                <div class="w-10 h-10 rounded-xl bg-brand-100 dark:bg-brand-900/30 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M17 20h5v-1a4 4 0 0 0-4-4h-1M9 20H4v-1a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1H9zm4-10a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                    </svg>
                </div>
                <h2 class="font-display text-base font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Panel de control</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1.5 leading-relaxed">Gestioná developers, pedidos y más.</p>
                <span class="inline-block mt-4 text-brand-500 text-xs font-semibold">Ir al panel →</span>
            </a>
            <a href="{{ route('developers.index') }}"
               class="group bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-md transition-all">
                <div class="w-10 h-10 rounded-xl bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                </div>
                <h2 class="font-display text-base font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Ver equipo</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1.5 leading-relaxed">Revisá cómo se ve el equipo en el sitio público.</p>
                <span class="inline-block mt-4 text-brand-500 text-xs font-semibold">Ver equipo →</span>
            </a>
            <a href="{{ route('home') }}"
               class="group bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-md transition-all">
                <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-700 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M3 12l2-2m0 0 7-7 7 7M5 10v10a1 1 0 0 0 1 1h3m10-11 2 2m-2-2v10a1 1 0 0 1-1 1h-3m-6 0a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1m-6 0h6"/>
                    </svg>
                </div>
                <h2 class="font-display text-base font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Ir al sitio</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1.5 leading-relaxed">Visitá el sitio como lo ven los visitantes.</p>
                <span class="inline-block mt-4 text-brand-500 text-xs font-semibold">Ver sitio →</span>
            </a>
        </div>

        {{-- CLIENTE --}}
        @elseif($user->isCliente())
        <div class="grid md:grid-cols-3 gap-4">
            <a href="{{ route('client.dashboard') }}"
               class="group bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-md transition-all">
                <div class="w-10 h-10 rounded-xl bg-brand-100 dark:bg-brand-900/30 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2"/>
                    </svg>
                </div>
                <h2 class="font-display text-base font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Mis pedidos</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1.5 leading-relaxed">Revisá el estado de tus proyectos.</p>
                <span class="inline-block mt-4 text-brand-500 text-xs font-semibold">Ver pedidos →</span>
            </a>
            <button onclick="document.getElementById('modal-contacto').classList.remove('hidden')"
               class="group bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-md hover:-translate-y-0.5 transition-all text-left w-full cursor-pointer">
                <div class="w-10 h-10 rounded-xl bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/>
                    </svg>
                </div>
                <h2 class="font-display text-base font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Contactanos</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1.5 leading-relaxed">¿Tenés una consulta o nuevo proyecto?</p>
                <span class="inline-block mt-4 text-brand-500 text-xs font-semibold group-hover:translate-x-1 transition-transform">Escribinos →</span>
            </button>
            <a href="{{ route('home') }}"
               class="group bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-md transition-all">
                <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-700 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                </div>
                <h2 class="font-display text-base font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Ir al sitio</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1.5 leading-relaxed">Visitá el sitio y conocé nuestros servicios.</p>
                <span class="inline-block mt-4 text-brand-500 text-xs font-semibold">Ver sitio →</span>
            </a>
        </div>

        {{-- DEVELOPER --}}
        @elseif($user->isDeveloper())
        <div class="grid md:grid-cols-2 gap-4 max-w-2xl">
            @if($user->developer)
            <a href="{{ route('developer.profile.edit') }}"
               class="group bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-md transition-all">
                <div class="w-10 h-10 rounded-xl bg-brand-100 dark:bg-brand-900/30 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.414-9.414a2 2 0 1 1 2.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h2 class="font-display text-base font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Mi perfil</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1.5 leading-relaxed">Editá tu bio, habilidades y datos de contacto.</p>
                <span class="inline-block mt-4 text-brand-500 text-xs font-semibold">Editar perfil →</span>
            </a>
            @endif
            <a href="{{ route('developers.index') }}"
               class="group bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-md transition-all">
                <div class="w-10 h-10 rounded-xl bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center mb-5">
                    <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" d="M17 20h5v-1a4 4 0 0 0-4-4h-1M9 20H4v-1a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1H9zm4-10a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                    </svg>
                </div>
                <h2 class="font-display text-base font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">Ver equipo</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1.5 leading-relaxed">Conocé a tus compañeros en el sitio público.</p>
                <span class="inline-block mt-4 text-brand-500 text-xs font-semibold">Ver equipo →</span>
            </a>
        </div>
        @endif

    </div>
</section>

@endsection