@extends('layouts.app')
@section('title', 'CodeBridge · Inicio')

@section('content')

{{-- HERO --}}
<section class="min-h-[92vh] flex items-center bg-white dark:bg-slate-900 relative overflow-hidden">
    <div class="absolute -top-20 -right-20 w-[480px] h-[480px] rounded-full bg-brand-50 dark:bg-brand-900/20 opacity-70 blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
        <div class="space-y-8">
            <span class="inline-block text-xs font-semibold tracking-widest text-brand-600 uppercase bg-brand-50 dark:bg-slate-800 px-4 py-1.5 rounded-full">
                Empresa de desarrollo de software
            </span>
            <h1 class="font-display text-5xl md:text-6xl font-extrabold text-ink dark:text-white leading-tight">
                Transformamos ideas en <span class="text-brand-500">soluciones digitales</span>
            </h1>
            <p class="text-slate-500 dark:text-slate-400 text-lg leading-relaxed max-w-md">
                Somos un equipo de desarrolladores apasionados con experiencia en diseño, desarrollo web y aplicaciones modernas.
            </p>
            <div class="flex flex-wrap items-center gap-3">
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.developers.index') }}"
                           class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors">
                            Ir al panel
                        </a>
                    @elseif(Auth::user()->isCliente())
                        <a href="{{ route('client.dashboard') }}"
                           class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors">
                            Ir a mi panel
                        </a>
                        <a href="{{ route('projects.index') }}"
                           class="border border-slate-200 dark:border-slate-700 hover:border-brand-400 text-slate-700 dark:text-slate-300 font-semibold px-6 py-2.5 rounded-xl transition-colors">
                            Ver proyectos
                        </a>
                    @elseif(Auth::user()->isDeveloper())
                        <a href="{{ route('dashboard') }}"
                           class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors">
                            Ir a mi panel
                        </a>
                    @endif
                @else
                    <a href="{{ route('projects.index') }}"
                       class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors">
                        Ver proyectos
                    </a>
                @endauth
                <a href="{{ route('developers.index') }}"
                    class="border border-slate-200 dark:border-slate-700 hover:border-brand-400 text-slate-700 dark:text-slate-300 font-semibold px-6 py-2.5 rounded-xl transition-colors">
                    Conocer el equipo
                </a>
            </div>
        </div>

        <div class="hidden md:grid grid-cols-2 gap-4">
            @foreach([
                ['7',   'Desarrolladores', 'bg-brand-50  dark:bg-brand-900/30 text-brand-700  dark:text-brand-300'],
                ['10+', 'Proyectos',       'bg-slate-50  dark:bg-slate-800    text-slate-700  dark:text-slate-300'],
                ['3+',  'Años de exp.',    'bg-green-50  dark:bg-green-900/30 text-green-700  dark:text-green-300'],
                ['100%','Compromiso',      'bg-amber-50  dark:bg-amber-900/30 text-amber-700  dark:text-amber-300'],
            ] as [$num, $label, $style])
            <div class="rounded-2xl {{ $style }} p-6 flex flex-col gap-1">
                <span class="font-display text-4xl font-extrabold">{{ $num }}</span>
                <span class="text-sm font-medium opacity-80">{{ $label }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section class="py-24 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-6xl mx-auto px-6">

        {{-- Encabezado --}}
        <div class="mb-14">
            <span class="inline-block text-xs font-semibold tracking-widest uppercase text-violet-600 dark:text-violet-400 bg-violet-100 dark:bg-violet-400/10 border border-violet-200 dark:border-violet-400/20 px-4 py-1.5 rounded-full mb-5">
                Quiénes somos
            </span>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-ink dark:text-white mb-4 leading-tight">
                El equipo detrás<br>de cada solución
            </h2>
            <p class="text-slate-500 dark:text-slate-400 text-lg leading-relaxed max-w-xl">
                DevStudio es una empresa de desarrollo de software con un equipo multidisciplinario,
                enfocado en crear productos de calidad con tecnologías modernas.
            </p>
        </div>

        {{-- Grilla de tarjetas unidas --}}
        <div class="grid md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-200 dark:divide-slate-700/60 rounded-2xl overflow-hidden ring-1 ring-slate-200 dark:ring-slate-700/60">

            {{-- Misión --}}
            <div class="bg-white dark:bg-slate-800/60 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors duration-200 p-8 flex flex-col gap-5">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">01</span>
                <div class="w-10 h-10 rounded-xl bg-violet-100 dark:bg-violet-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-violet-600 dark:text-violet-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-display text-lg font-bold text-ink dark:text-white mb-2">Misión</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Desarrollar soluciones tecnológicas innovadoras que impulsen el crecimiento de nuestros clientes.</p>
                </div>
                <div class="mt-auto pt-4">
                    <div class="w-7 h-0.5 rounded-full bg-violet-500"></div>
                </div>
            </div>

            {{-- Visión --}}
            <div class="bg-white dark:bg-slate-800/60 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors duration-200 p-8 flex flex-col gap-5">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">02</span>
                <div class="w-10 h-10 rounded-xl bg-teal-100 dark:bg-teal-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-display text-lg font-bold text-ink dark:text-white mb-2">Visión</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Ser referentes en el desarrollo de software a nivel regional, reconocidos por la excelencia y creatividad.</p>
                </div>
                <div class="mt-auto pt-4">
                    <div class="w-7 h-0.5 rounded-full bg-teal-500"></div>
                </div>
            </div>

            {{-- Valores --}}
            <div class="bg-white dark:bg-slate-800/60 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors duration-200 p-8 flex flex-col gap-5">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">03</span>
                <div class="w-10 h-10 rounded-xl bg-amber-100 dark:bg-amber-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l2.09 6.26H20.5l-5.27 3.83 2.01 6.18L12 14.27l-5.24 4 2.01-6.18L3.5 8.26H9.91L12 2z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-display text-lg font-bold text-ink dark:text-white mb-2">Valores</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Calidad, compromiso, trabajo en equipo y aprendizaje continuo guían cada proyecto que emprendemos.</p>
                </div>
                <div class="mt-auto pt-4">
                    <div class="w-7 h-0.5 rounded-full bg-amber-500"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- HABILIDADES --}}
<section class="py-24 bg-white dark:bg-slate-800">
    <div class="max-w-6xl mx-auto px-6">

        {{-- Encabezado --}}
        <div class="mb-14">
            <span class="inline-block text-xs font-semibold tracking-widest uppercase text-teal-600 dark:text-teal-400 bg-teal-100 dark:bg-teal-400/10 border border-teal-200 dark:border-teal-400/20 px-4 py-1.5 rounded-full mb-5">
                Stack tecnológico
            </span>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-ink dark:text-white mb-4 leading-tight">
                Nuestras tecnologías
            </h2>
            <p class="text-slate-500 dark:text-slate-400 text-lg leading-relaxed max-w-xl">
                Trabajamos con las herramientas más modernas del mercado para garantizar
                soluciones robustas, escalables y de alto rendimiento para cada cliente.
            </p>
        </div>

        {{-- Tarjetas de áreas --}}
        <div class="grid md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-200 dark:divide-slate-700/60 rounded-2xl overflow-hidden ring-1 ring-slate-200 dark:ring-slate-700/60 mb-16">

            {{-- Backend --}}
            <div class="bg-slate-50 dark:bg-slate-900/60 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-200 p-8 flex flex-col gap-5">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">01</span>
                <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12l4-4m-4 4 4 4M19 12l-4-4m4 4-4 4"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-display text-lg font-bold text-ink dark:text-white mb-2">Backend</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">APIs y sistemas robustos con PHP, Laravel y Node.js, garantizando seguridad y escalabilidad.</p>
                </div>
                <div class="mt-auto pt-4 flex flex-wrap gap-1.5">
                    @foreach(['PHP', 'Laravel', 'Node.js'] as $tag)
                    <span class="text-xs px-2.5 py-1 rounded-full bg-blue-100 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 border border-blue-200 dark:border-blue-500/20">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Frontend --}}
            <div class="bg-slate-50 dark:bg-slate-900/60 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-200 p-8 flex flex-col gap-5">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">02</span>
                <div class="w-10 h-10 rounded-xl bg-pink-100 dark:bg-pink-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 8l-4 4 4 4M17 8l4 4-4 4M14 4l-4 16"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-display text-lg font-bold text-ink dark:text-white mb-2">Frontend</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Interfaces modernas y responsive con React, Vue.js, TypeScript y Tailwind CSS.</p>
                </div>
                <div class="mt-auto pt-4 flex flex-wrap gap-1.5">
                    @foreach(['React', 'Vue.js', 'TypeScript', 'Tailwind'] as $tag)
                    <span class="text-xs px-2.5 py-1 rounded-full bg-pink-100 dark:bg-pink-500/10 text-pink-700 dark:text-pink-400 border border-pink-200 dark:border-pink-500/20">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Base de datos --}}
            <div class="bg-slate-50 dark:bg-slate-900/60 hover:bg-slate-100 dark:hover:bg-slate-900 transition-colors duration-200 p-8 flex flex-col gap-5">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">03</span>
                <div class="w-10 h-10 rounded-xl bg-teal-100 dark:bg-teal-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <ellipse cx="12" cy="5" rx="9" ry="3"/><path stroke-linecap="round" d="M3 5v14c0 1.657 4.03 3 9 3s9-1.343 9-3V5"/><path stroke-linecap="round" d="M3 12c0 1.657 4.03 3 9 3s9-1.343 9-3"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-display text-lg font-bold text-ink dark:text-white mb-2">Base de datos</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Gestión de datos con MySQL y PostgreSQL, optimizando consultas para el mejor rendimiento.</p>
                </div>
                <div class="mt-auto pt-4 flex flex-wrap gap-1.5">
                    @foreach(['MySQL', 'PostgreSQL'] as $tag)
                    <span class="text-xs px-2.5 py-1 rounded-full bg-teal-100 dark:bg-teal-500/10 text-teal-700 dark:text-teal-400 border border-teal-200 dark:border-teal-500/20">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Logos de tecnologías --}}
        <div class="border-t border-slate-200 dark:border-slate-700 pt-12">
            <p class="text-xs font-semibold tracking-widest uppercase text-slate-400 dark:text-slate-600 mb-8">Herramientas que usamos</p>
            <div class="flex flex-wrap items-center gap-6">
                @foreach([
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg', 'JavaScript'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', 'React'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg', 'Node.js'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg', 'PostgreSQL'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg', 'MySQL'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg', 'CSS3'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg', 'HTML5'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg', 'Bootstrap'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg', 'TypeScript'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg', 'PHP'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg', 'Laravel'],
                    ['https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg', 'Git'],
                ] as [$icon, $name])
                <div class="flex flex-col items-center gap-2 group opacity-50 hover:opacity-100 transition-opacity duration-200">
                    <div class="w-10 h-10 p-2 bg-slate-100 dark:bg-slate-800 rounded-xl group-hover:bg-slate-200 dark:group-hover:bg-slate-700 transition-colors duration-200">
                        <img src="{{ $icon }}" alt="{{ $name }}" class="w-full h-full object-contain">
                    </div>
                    <span class="text-xs text-slate-400 dark:text-slate-500 group-hover:text-slate-600 dark:group-hover:text-slate-300 transition-colors font-medium">{{ $name }}</span>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
{{-- CONTACTO --}}
<section class="py-16 bg-slate-50 dark:bg-slate-800">
    <div class="max-w-6xl mx-auto px-6">
        <div class="bg-ink dark:bg-slate-900 rounded-3xl px-10 py-12 flex flex-col md:flex-row items-center justify-between gap-8">
            <h2 class="font-display text-4xl font-extrabold text-white">¡Hablemos!</h2>
            <p class="text-slate-300 text-center md:text-left max-w-sm leading-relaxed">
                ¿Buscás un equipo que transforme ideas en soluciones web eficientes y escalables?
                Contactanos y descubrí cómo podemos aportar a tu próximo proyecto.
            </p>
            <button onclick="document.getElementById('modal-contacto').classList.remove('hidden')"
                    class="shrink-0 bg-white hover:bg-slate-100 text-ink font-bold px-8 py-4 rounded-2xl transition-colors flex items-center gap-2">
                Contacto
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 bg-brand-900 dark:bg-slate-950">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="font-display text-4xl font-extrabold text-white mb-4">¿Listo para trabajar con nosotros?</h2>
        <p class="text-slate-300 mb-10 text-lg">
            @auth Revisá tus proyectos o conocé al equipo detrás de cada solución.
            @else Revisa nuestra galería de proyectos y conoce al equipo detrás de cada solución.
            @endauth
        </p>
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.developers.index') }}"
                   class="inline-block bg-brand-500 hover:bg-brand-600 text-white font-semibold px-8 py-4 rounded-xl transition-colors text-lg shadow-lg">
                    Ir al panel de control
                </a>
            @elseif(Auth::user()->isCliente())
                <a href="{{ route('client.dashboard') }}"
                   class="inline-block bg-brand-500 hover:bg-brand-600 text-white font-semibold px-8 py-4 rounded-xl transition-colors text-lg shadow-lg">
                    Ir a mis proyectos
                </a>
            @elseif(Auth::user()->isDeveloper())
                <a href="{{ route('dashboard') }}"
                   class="inline-block bg-brand-500 hover:bg-brand-600 text-white font-semibold px-8 py-4 rounded-xl transition-colors text-lg shadow-lg">
                    Ir a mi panel
                </a>
            @endif
        @else
            <a href="{{ route('projects.index') }}"
               class="inline-block bg-brand-500 hover:bg-brand-600 text-white font-semibold px-8 py-4 rounded-xl transition-colors text-lg shadow-lg">
                Ver todos los proyectos
            </a>
        @endauth
    </div>
</section>
@endsection