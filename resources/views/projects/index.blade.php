@extends('layouts.app')
@section('title', 'Proyectos · CodeBridge')

@section('content')

<section class="py-20 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <div class="max-w-2xl mb-12">
            <span class="text-xs font-semibold tracking-widest text-brand-600 uppercase bg-brand-50 dark:bg-slate-800 px-3 py-1.5 rounded-full">
                Portafolio
            </span>
            <h1 class="font-display text-3xl sm:text-4xl font-bold text-ink dark:text-white mt-4 mb-3">Nuestros proyectos</h1>
            <p class="text-slate-500 dark:text-slate-400 text-base sm:text-lg leading-relaxed">
                Una selección de los trabajos que mejor reflejan nuestra experiencia y creatividad.
            </p>
        </div>

        @if($projects->isEmpty())
            <div class="text-center py-20 text-slate-400">
                <p class="text-xl font-display font-bold mb-1">Sin proyectos aún</p>
                <p class="text-sm">Pronto agregaremos el contenido de la galería.</p>
            </div>
        @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
            <article class="bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 overflow-hidden hover:shadow-md transition-shadow group flex flex-col">

                @if($project->image)
                    <img src="{{ $project->image }}"
                         alt="{{ $project->title }}"
                         class="w-full h-44 object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-44 bg-gradient-to-br from-brand-50 to-brand-100 dark:from-slate-700 dark:to-slate-600 flex items-center justify-center">
                        <svg class="w-12 h-12 text-brand-300 dark:text-brand-500/50" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14,2 14,8 20,8"/>
                            <path stroke-linecap="round" d="M16 13H8M16 17H8M10 9H8"/>
                        </svg>
                    </div>
                @endif

                <div class="p-5 flex flex-col flex-1">
                    @if($project->category)
                    <span class="text-xs font-semibold text-brand-600 dark:text-brand-400 uppercase tracking-widest mb-3">
                        {{ $project->category }}
                    </span>
                    @endif

                    <h2 class="font-display text-lg font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors mb-2">
                        {{ $project->title }}
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed line-clamp-3 mb-4">
                        {{ $project->description }}
                    </p>

                    @if($project->technologies)
                    @php
                        $techIcons = [
                            'React'        => 'react',
                            'TypeScript'   => 'typescript',
                            'JavaScript'   => 'javascript',
                            'HTML'         => 'html5',
                            'CSS'          => 'css3',
                            'Bootstrap'    => 'bootstrap',
                            'Node.js'      => 'nodedotjs',
                            'Express'      => 'express',
                            'PostgreSQL'   => 'postgresql',
                            'MySQL'        => 'mysql',
                            'Redux'        => 'redux',
                            'PHP'          => 'php',
                            'Laravel'      => 'laravel',
                            'Vue.js'       => 'vuedotjs',
                            'Tailwind CSS' => 'tailwindcss',
                            'Vite'         => 'vite',
                            'Git'          => 'git',
                        ];
                    @endphp
                    <div class="flex flex-wrap gap-2 mb-auto">
                        @foreach(explode(',', $project->technologies) as $tech)
                        @php $techName = trim($tech); @endphp
                        @if(isset($techIcons[$techName]))
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-md hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                                <img src="https://cdn.simpleicons.org/{{ $techIcons[$techName] }}"
                                     alt="{{ $techName }}"
                                     class="w-4 h-4 shrink-0"
                                     onerror="this.style.display='none'">
                                {{ $techName }}
                            </span>
                        @else
                            <span class="px-2.5 py-1 text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-md">
                                {{ $techName }}
                            </span>
                        @endif
                        @endforeach
                    </div>
                    @endif

                    @if($project->developer)
                    <div class="flex items-center gap-2 mt-4 pt-3 border-t border-slate-100 dark:border-slate-700">
                        <div class="w-6 h-6 rounded-full bg-brand-100 dark:bg-brand-900/40 text-brand-700 dark:text-brand-400 flex items-center justify-center text-[10px] font-bold shrink-0">
                            {{ strtoupper(substr($project->developer->name, 0, 1)) }}
                        </div>
                        <span class="text-xs text-slate-500 dark:text-slate-400">{{ $project->developer->name }}</span>
                    </div>
                    @endif

                    @if($project->link)
                    <div class="mt-4">
                        <a href="{{ $project->link }}" target="_blank"
                           class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-600 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition-colors w-full justify-center">
                            Ver proyecto
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                    </div>
                    @endif
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $projects->links() }}
        </div>
        @endif

    </div>
</section>

@endsection
