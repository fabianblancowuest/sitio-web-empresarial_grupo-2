@extends('layouts.app')
@section('title', $developer->name . ' · CodeBridge')

@section('content')

@php
    $parts    = explode(' ', $developer->name);
    $initials = strtoupper(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
    $colors   = ['bg-brand-100 text-brand-700','bg-green-100 text-green-700','bg-amber-100 text-amber-700','bg-pink-100 text-pink-700','bg-purple-100 text-purple-700','bg-teal-100 text-teal-700','bg-red-100 text-red-700'];
    $color    = $colors[$developer->id % count($colors)];
@endphp

<section class="py-20 bg-slate-50 dark:bg-slate-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        <a href="{{ route('developers.index') }}"
           class="inline-flex items-center gap-1 text-sm text-slate-500 hover:text-brand-500 mb-8 transition-colors">
            &larr; Volver al equipo
        </a>

        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 overflow-hidden">

            <div class="h-24 bg-gradient-to-r from-brand-600 to-brand-400"></div>

            <div class="px-6 sm:px-8 pb-8">
                <div class="-mt-12 mb-6">
                    @if($developer->photo)
                        <img src="{{ asset($developer->photo) }}"
                             alt="{{ $developer->name }}"
                             class="w-20 h-20 rounded-xl object-cover border-4 border-white dark:border-slate-800 shadow-md"
                             style="object-position: center top;">
                    @else
                        <div class="w-20 h-20 rounded-xl {{ $color }} flex items-center justify-center text-2xl font-display font-bold border-4 border-white dark:border-slate-800 shadow-md">
                            {{ $initials }}
                        </div>
                    @endif
                </div>

                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6">
                    <div>
                        <h1 class="font-display text-3xl font-bold text-ink dark:text-white">{{ $developer->name }}</h1>
                        @if($developer->role)
                        <p class="text-slate-500 dark:text-slate-400 mt-1">{{ $developer->role }}</p>
                        @endif
                    </div>
                    @if($developer->email)
                    <a href="mailto:{{ $developer->email }}"
                       class="inline-block border border-brand-200 text-brand-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-brand-50 transition-colors">
                        Contactar
                    </a>
                    @endif
                </div>

                @if($developer->bio)
                <div class="mb-8">
                    <h2 class="font-display text-base font-bold text-ink dark:text-white mb-2">Sobre m&iacute;</h2>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed text-sm">{{ $developer->bio }}</p>
                </div>
                @endif

                @if($developer->skills)
                <div class="mb-8">
                    <h2 class="font-display text-base font-bold text-ink dark:text-white mb-3">Habilidades</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $developer->skills) as $skill)
                        <span class="px-3 py-1.5 bg-brand-50 dark:bg-brand-900/30 text-brand-700 dark:text-brand-300 text-sm font-semibold rounded-lg border border-brand-100 dark:border-brand-800">
                            {{ trim($skill) }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($developer->projects && $developer->projects->isNotEmpty())
                <div>
                    <h2 class="font-display text-base font-bold text-ink dark:text-white mb-4">Proyectos</h2>
                    <div class="grid sm:grid-cols-2 gap-4">
                        @foreach($developer->projects as $project)
                        <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-4 border border-slate-100 dark:border-slate-700">
                            <h3 class="font-display font-bold text-ink dark:text-white mb-1">{{ $project->title }}</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2">{{ $project->description }}</p>
                            @if($project->link)
                            <a href="{{ $project->link }}" target="_blank"
                               class="inline-block mt-2 text-xs font-semibold text-brand-500 hover:underline">
                                Ver proyecto &rarr;
                            </a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>

    </div>
</section>

@endsection
