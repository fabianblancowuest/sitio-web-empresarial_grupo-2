@extends('layouts.app')
@section('title', 'Equipo · CodeBridge')

@section('content')

<section class="py-24 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-6xl mx-auto px-6">

        {{-- Encabezado --}}
        <div class="max-w-2xl mb-16">
            <span class="text-xs font-semibold tracking-widest text-brand-600 uppercase bg-brand-50 dark:bg-slate-800 px-4 py-1.5 rounded-full">
                Nuestro equipo
            </span>
            <h1 class="font-display text-5xl font-extrabold text-ink dark:text-white mt-4 mb-4">Los desarrolladores</h1>
            <p class="text-slate-500 dark:text-slate-400 text-lg leading-relaxed">
                Conocé a las personas que hacen posible cada proyecto.
            </p>
        </div>

        {{-- Grilla de perfiles --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($developers as $developer)
            @php
            $parts = explode(' ', $developer->name);
            $initials = strtoupper(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
            $colors = ['bg-brand-100 text-brand-700','bg-green-100 text-green-700','bg-amber-100 text-amber-700','bg-pink-100 text-pink-700','bg-purple-100 text-purple-700','bg-teal-100 text-teal-700','bg-red-100 text-red-700'];
            $color = $colors[$developer->id % count($colors)];
            @endphp
            <a href="{{ route('developers.show', $developer) }}"
                class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center gap-4 group">

                {{-- Avatar con foto o iniciales --}}
                @if($developer->photo)
                <div class="w-20 h-20 rounded-full overflow-hidden border-2 border-white shadow">
                    <img src="{{ asset($developer->photo) }}"
                        alt="{{ $developer->name }}"
                        class="w-full h-full object-cover object-top">
                </div>
                @else
                <div class="w-20 h-20 rounded-full {{ $color }} flex items-center justify-center text-2xl font-display font-extrabold border-2 border-white shadow">
                    {{ $initials }}
                </div>
                @endif

                <div>
                    <h2 class="font-display font-bold text-ink dark:text-white text-base group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">
                        {{ $developer->name }}
                    </h2>
                    @if($developer->role)
                    <p class="text-slate-400 dark:text-slate-500 text-xs mt-1">{{ $developer->role }}</p>
                    @endif
                </div>

                @if($developer->bio)
                <p class="text-slate-500 dark:text-slate-400 text-xs leading-relaxed line-clamp-2">
                    {{ $developer->bio }}
                </p>
                @endif

                @if($developer->skills)
                <div class="flex flex-wrap justify-center gap-1.5">
                    @foreach(array_slice(explode(',', $developer->skills), 0, 3) as $skill)
                    <span class="px-2 py-0.5 text-xs bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-full">{{ trim($skill) }}</span>
                    @endforeach
                </div>
                @endif

                <span class="text-xs font-semibold text-brand-500 group-hover:underline mt-auto">Ver perfil →</span>
            </a>
            @endforeach
        </div>

    </div>
</section>

@endsection