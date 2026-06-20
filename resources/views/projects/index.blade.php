@extends('layouts.app')
@section('title', 'Proyectos · CodeBridge')

@section('content')

<section class="py-24 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-6xl mx-auto px-6">

        <div class="max-w-2xl mb-16">
            <span class="text-xs font-semibold tracking-widest text-brand-600 uppercase bg-brand-50 dark:bg-slate-800 px-4 py-1.5 rounded-full">
                Portafolio
            </span>
            <h1 class="font-display text-5xl font-extrabold text-ink dark:text-white mt-4 mb-4">Nuestros proyectos</h1>
            <p class="text-slate-500 dark:text-slate-400 text-lg leading-relaxed">
                Una selección de los trabajos que mejor reflejan nuestra experiencia y creatividad.
            </p>
        </div>

        @if($projects->isEmpty())
            <div class="text-center py-24 text-slate-400">
                <p class="text-2xl font-display font-bold mb-2">Sin proyectos aún</p>
                <p class="text-sm">Pronto agregaremos el contenido de la galería.</p>
            </div>
        @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <article class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 overflow-hidden hover:shadow-lg transition-shadow group flex flex-col">

                @if($project->image)
                    <img src="{{ $project->image }}"
                         alt="{{ $project->title }}"
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-48 bg-brand-50 dark:bg-slate-700 flex items-center justify-center">
                        <span class="text-brand-300 text-5xl">💻</span>
                    </div>
                @endif

                <div class="p-6 space-y-3 flex flex-col flex-1">
                    @if($project->category)
                    <span class="text-xs font-semibold text-brand-600 dark:text-brand-400 uppercase tracking-widest">
                        {{ $project->category }}
                    </span>
                    @endif

                    <h2 class="font-display text-xl font-bold text-ink dark:text-white group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">
                        {{ $project->title }}
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed line-clamp-3">
                        {{ $project->description }}
                    </p>

                    @if($project->technologies)
                    @php
                        $techIcons = [
                            'React'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg',
                            'TypeScript'   => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg',
                            'JavaScript'   => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg',
                            'HTML'         => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg',
                            'CSS'          => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg',
                            'Bootstrap'    => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg',
                            'Node.js'      => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg',
                            'Express'      => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/express/express-original.svg',
                            'PostgreSQL'   => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg',
                            'MySQL'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg',
                            'Redux'        => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redux/redux-original.svg',
                            'PHP'          => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg',
                            'Laravel'      => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg',
                            'Vue.js'       => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg',
                            'Tailwind CSS' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original.svg',
                            'Vite'         => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vitejs/vitejs-original.svg',
                            'Git'          => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg',
                        ];
                    @endphp
                    <div class="flex flex-wrap gap-3 pt-2">
                        @foreach(explode(',', $project->technologies) as $tech)
                        @php $techName = trim($tech); @endphp
                        @if(isset($techIcons[$techName]))
                            <img src="{{ $techIcons[$techName] }}" alt="{{ $techName }}" title="{{ $techName }}"
                                 class="w-7 h-7 object-contain hover:scale-125 transition-transform duration-200"
                                 onerror="this.style.display='none'">
                        @else
                            <span class="px-2.5 py-1 text-xs bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-full">
                                {{ $techName }}
                            </span>
                        @endif
                        @endforeach
                    </div>
                    @endif

                    @if($project->developer)
                    <div class="pt-3 border-t border-slate-100 dark:border-slate-700 flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center text-xs font-bold">
                            {{ strtoupper(substr($project->developer->name, 0, 1)) }}
                        </div>
                        <span class="text-xs text-slate-500 dark:text-slate-400">{{ $project->developer->name }}</span>
                    </div>
                    @endif

                    @if($project->link)
                    <div class="pt-2 mt-auto">
                        <a href="{{ $project->link }}" target="_blank"
                           class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors w-full justify-center">
                            Ver proyecto
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

        <div class="mt-12">
            {{ $projects->links() }}
        </div>
        @endif

    </div>
</section>

@endsection