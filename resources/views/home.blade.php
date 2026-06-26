@extends('layouts.app')
@section('title', 'CodeBridge · Inicio')

@section('content')

{{-- HERO --}}
<section class="min-h-[85vh] flex items-center bg-white dark:bg-slate-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <span class="inline-block text-xs font-semibold tracking-widest text-brand-600 uppercase bg-brand-50 dark:bg-slate-800 px-3 py-1.5 rounded-full">
                Empresa de desarrollo de software
            </span>
            <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-bold text-ink dark:text-white leading-tight">
                Transformamos ideas en <span class="text-brand-500">soluciones digitales</span>
            </h1>
            <p class="text-slate-500 dark:text-slate-400 text-base sm:text-lg leading-relaxed max-w-md">
                Somos un equipo de desarrolladores apasionados con experiencia en diseño, desarrollo web y aplicaciones modernas.
            </p>
            <div class="flex flex-wrap items-center gap-3">
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.developers.index') }}"
                           class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                            Ir al panel
                        </a>
                    @elseif(Auth::user()->isCliente())
                        <a href="{{ route('client.dashboard') }}"
                           class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                            Ir a mi panel
                        </a>
                        <a href="{{ route('projects.index') }}"
                           class="border border-slate-200 dark:border-slate-700 hover:border-brand-400 text-slate-700 dark:text-slate-300 font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                            Ver proyectos
                        </a>
                    @elseif(Auth::user()->isDeveloper())
                        <a href="{{ route('dashboard') }}"
                           class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                            Ir a mi panel
                        </a>
                    @endif
                @else
                    <a href="{{ route('projects.index') }}"
                       class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                        Ver proyectos
                    </a>
                @endauth
                <a href="{{ route('developers.index') }}"
                    class="border border-slate-200 dark:border-slate-700 hover:border-brand-400 text-slate-700 dark:text-slate-300 font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
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
            <div class="rounded-xl {{ $style }} p-6 flex flex-col gap-1">
                <span class="font-display text-3xl font-bold">{{ $num }}</span>
                <span class="text-sm font-medium opacity-80">{{ $label }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section class="py-20 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <div class="mb-12">
            <span class="inline-block text-xs font-semibold tracking-widest uppercase text-violet-600 dark:text-violet-400 bg-violet-100 dark:bg-violet-400/10 px-3 py-1.5 rounded-full mb-4">
                Quiénes somos
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-ink dark:text-white mb-3">
                El equipo detrás de cada solución
            </h2>
            <p class="text-slate-500 dark:text-slate-400 text-base sm:text-lg leading-relaxed max-w-xl">
                CodeBridge es una empresa de desarrollo de software con un equipo multidisciplinario,
                enfocado en crear productos de calidad con tecnologías modernas.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-0 md:divide-x divide-slate-200 dark:divide-slate-700/60 rounded-xl overflow-hidden ring-1 ring-slate-200 dark:ring-slate-700/60">
            <div class="bg-white dark:bg-slate-800/60 p-8">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">01</span>
                <h3 class="font-display text-lg font-bold text-ink dark:text-white mt-4 mb-2">Misión</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Desarrollar soluciones tecnológicas innovadoras que impulsen el crecimiento de nuestros clientes.</p>
            </div>
            <div class="bg-white dark:bg-slate-800/60 p-8">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">02</span>
                <h3 class="font-display text-lg font-bold text-ink dark:text-white mt-4 mb-2">Visión</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Ser referentes en el desarrollo de software a nivel regional, reconocidos por la excelencia y creatividad.</p>
            </div>
            <div class="bg-white dark:bg-slate-800/60 p-8">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">03</span>
                <h3 class="font-display text-lg font-bold text-ink dark:text-white mt-4 mb-2">Valores</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Calidad, compromiso, trabajo en equipo y aprendizaje continuo guían cada proyecto que emprendemos.</p>
            </div>
        </div>
    </div>
</section>

{{-- HABILIDADES --}}
<section class="py-20 bg-white dark:bg-slate-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <div class="mb-12">
            <span class="inline-block text-xs font-semibold tracking-widest uppercase text-teal-600 dark:text-teal-400 bg-teal-100 dark:bg-teal-400/10 px-3 py-1.5 rounded-full mb-4">
                Stack tecnológico
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-ink dark:text-white mb-3">
                Nuestras tecnologías
            </h2>
            <p class="text-slate-500 dark:text-slate-400 text-base sm:text-lg leading-relaxed max-w-xl">
                Trabajamos con las herramientas más modernas del mercado para garantizar
                soluciones robustas, escalables y de alto rendimiento.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-0 md:divide-x divide-slate-200 dark:divide-slate-700/60 rounded-xl overflow-hidden ring-1 ring-slate-200 dark:ring-slate-700/60 mb-14">
            <div class="bg-slate-50 dark:bg-slate-900/60 p-8">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">01</span>
                <h3 class="font-display text-lg font-bold text-ink dark:text-white mt-4 mb-2">Backend</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-4">APIs y sistemas robustos con PHP, Laravel y Node.js, garantizando seguridad y escalabilidad.</p>
                <div class="flex flex-wrap gap-1.5">
                    @foreach(['PHP', 'Laravel', 'Node.js'] as $tag)
                    <span class="text-xs px-2.5 py-1 rounded-full bg-blue-100 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            <div class="bg-slate-50 dark:bg-slate-900/60 p-8">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">02</span>
                <h3 class="font-display text-lg font-bold text-ink dark:text-white mt-4 mb-2">Frontend</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-4">Interfaces modernas y responsive con React, Vue.js, TypeScript y Tailwind CSS.</p>
                <div class="flex flex-wrap gap-1.5">
                    @foreach(['React', 'Vue.js', 'TypeScript', 'Tailwind'] as $tag)
                    <span class="text-xs px-2.5 py-1 rounded-full bg-pink-100 dark:bg-pink-500/10 text-pink-700 dark:text-pink-400">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            <div class="bg-slate-50 dark:bg-slate-900/60 p-8">
                <span class="text-xs font-semibold tracking-widest text-slate-400 dark:text-slate-600">03</span>
                <h3 class="font-display text-lg font-bold text-ink dark:text-white mt-4 mb-2">Base de datos</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-4">Gestión de datos con MySQL y PostgreSQL, optimizando consultas para el mejor rendimiento.</p>
                <div class="flex flex-wrap gap-1.5">
                    @foreach(['MySQL', 'PostgreSQL'] as $tag)
                    <span class="text-xs px-2.5 py-1 rounded-full bg-teal-100 dark:bg-teal-500/10 text-teal-700 dark:text-teal-400">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="border-t border-slate-200 dark:border-slate-700 pt-10">
            <p class="text-xs font-semibold tracking-widest uppercase text-slate-400 dark:text-slate-600 mb-6">Herramientas que usamos</p>
            <div class="flex flex-wrap items-center gap-5">
                @foreach([
                    ['javascript', 'JavaScript'],
                    ['react', 'React'],
                    ['nodedotjs', 'Node.js'],
                    ['postgresql', 'PostgreSQL'],
                    ['mysql', 'MySQL'],
                    ['css3', 'CSS3'],
                    ['html5', 'HTML5'],
                    ['bootstrap', 'Bootstrap'],
                    ['typescript', 'TypeScript'],
                    ['php', 'PHP'],
                    ['laravel', 'Laravel'],
                    ['git', 'Git'],
                ] as [$slug, $name])
                <div class="flex flex-col items-center gap-2 group opacity-50 hover:opacity-100 transition-opacity">
                    <div class="w-9 h-9 p-2 bg-slate-100 dark:bg-slate-800 rounded-lg group-hover:bg-slate-200 dark:group-hover:bg-slate-700 transition-colors">
                        <img src="https://cdn.simpleicons.org/{{ $slug }}"
                             alt="{{ $name }}"
                             class="w-full h-full object-contain"
                             onerror="this.parentElement.innerHTML='<span class=\'text-xs font-bold text-slate-400\'>{{ substr($name, 0, 2) }}</span>'">
                    </div>
                    <span class="text-xs text-slate-400 dark:text-slate-500 font-medium">{{ $name }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CONTACTO --}}
<section class="py-16 bg-slate-50 dark:bg-slate-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="bg-ink dark:bg-slate-900 rounded-2xl px-6 sm:px-10 py-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-white">&iexcl;Hablemos!</h2>
                <p class="text-slate-300 text-center md:text-left mt-2 max-w-sm leading-relaxed text-sm sm:text-base">
                    &iquest;Busc&aacute;s un equipo que transforme ideas en soluciones web eficientes y escalables?
                </p>
            </div>
            <button onclick="document.getElementById('modal-contacto').classList.remove('hidden')"
                    class="shrink-0 bg-white hover:bg-slate-100 text-ink font-bold px-6 py-3 rounded-lg transition-colors flex items-center gap-2 text-sm">
                Contacto
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 bg-brand-900 dark:bg-slate-950">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-white mb-3">&iquest;Listo para trabajar con nosotros?</h2>
        <p class="text-slate-300 mb-8 text-base sm:text-lg">
            @auth Revis&aacute; tus proyectos o conoc&eacute; al equipo detr&aacute;s de cada soluci&oacute;n.
            @else Revis&aacute; nuestra galer&iacute;a de proyectos y conoc&eacute; al equipo detr&aacute;s de cada soluci&oacute;n.
            @endauth
        </p>
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.developers.index') }}"
                   class="inline-block bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors shadow">
                    Ir al panel de control
                </a>
            @elseif(Auth::user()->isCliente())
                <a href="{{ route('client.dashboard') }}"
                   class="inline-block bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors shadow">
                    Ir a mis proyectos
                </a>
            @elseif(Auth::user()->isDeveloper())
                <a href="{{ route('dashboard') }}"
                   class="inline-block bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors shadow">
                    Ir a mi panel
                </a>
            @endif
        @else
            <a href="{{ route('projects.index') }}"
               class="inline-block bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors shadow">
                Ver todos los proyectos
            </a>
        @endauth
    </div>
</section>
@endsection
