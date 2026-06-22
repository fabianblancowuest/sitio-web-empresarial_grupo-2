<!DOCTYPE html>
<html lang="es" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CodeBridge')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <script>
        if (localStorage.getItem('theme') === 'dark' ||
            (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;800&family=DM+Sans:wght@400;500&display=swap"
        rel="stylesheet">
</head>

<body
    class="font-sans antialiased bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 transition-colors duration-300">

    {{-- NAVBAR --}}
    <header
        class="fixed top-0 inset-x-0 z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur border-b border-slate-100 dark:border-slate-800 transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('favicon.png') }}" alt="CodeBridge" class="h-8 w-auto">
                <span class="font-display font-800 text-xl tracking-tight text-ink dark:text-white">
                    Code<span class="text-brand-500">Bridge</span>
                </span>
            </a>

            {{-- Nav desktop --}}
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600 dark:text-slate-300">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-brand-500 dark:text-brand-400' : 'hover:text-brand-500 dark:hover:text-brand-400' }} transition-colors">Inicio</a>
                <a href="{{ route('projects.index') }}"
                    class="{{ request()->routeIs('projects.*') ? 'text-brand-500 dark:text-brand-400' : 'hover:text-brand-500 dark:hover:text-brand-400' }} transition-colors">Proyectos</a>
                <a href="{{ route('developers.index') }}"
                    class="{{ request()->routeIs('developers.*') ? 'text-brand-500 dark:text-brand-400' : 'hover:text-brand-500 dark:hover:text-brand-400' }} transition-colors">Equipo</a>
                <button onclick="document.getElementById('modal-contacto').classList.remove('hidden')"
                    class="hover:text-brand-500 dark:hover:text-brand-400 transition-colors">
                    Contacto
                </button>
            </nav>

            <div class="flex items-center gap-3">

                {{-- Auth desktop --}}
                @auth
                    <div class="hidden md:flex items-center relative"
                         x-data="{ open: false }"
                         @click.outside="open = false">
                        <button @click="open = !open"
                                class="flex items-center gap-1 text-sm font-semibold text-brand-500 hover:text-brand-600 transition-colors">
                            Mi Panel
                            <svg class="w-4 h-4" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition
                             class="absolute top-full right-0 mt-2 w-52 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-lg py-2 z-50">
                            <a href="{{ route('dashboard') }}"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                                Dashboard
                            </a>
                            <a href="{{ route('profile.edit') }}"
                               class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.414-9.414a2 2 0 1 1 2.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Perfil
                            </a>
                            <div class="border-t border-slate-100 dark:border-slate-700 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" d="M17 16l4-4m0 0-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1"/></svg>
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-brand-500 transition-colors hidden md:block">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}"
                        class="text-sm font-semibold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 px-4 py-2 rounded-xl transition-colors hidden md:block">
                        Registrarse
                    </a>
                @endauth

                {{-- Botón modo oscuro --}}
                <button onclick="toggleDark()"
                    class="p-2 rounded-lg text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors"
                    title="Cambiar tema">
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.07-6.07-.71.71M6.34 17.66l-.71.71m12.73 0-.71-.71M6.34 6.34l-.71-.71M12 5a7 7 0 1 0 0 14A7 7 0 0 0 12 5z" />
                    </svg>
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                    </svg>
                </button>

                {{-- Menú hamburguesa mobile --}}
                <button class="md:hidden text-slate-600 dark:text-slate-300 p-2"
                    onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Menú mobile --}}
        <div id="mobile-menu"
            class="hidden md:hidden bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 px-6 py-4 flex flex-col gap-4 text-sm text-slate-700 dark:text-slate-300">
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'text-brand-500' : '' }}">Inicio</a>
            <a href="{{ route('projects.index') }}"
               class="{{ request()->routeIs('projects.*') ? 'text-brand-500' : '' }}">Proyectos</a>
            <a href="{{ route('developers.index') }}"
               class="{{ request()->routeIs('developers.*') ? 'text-brand-500' : '' }}">Equipo</a>
            <button onclick="document.getElementById('modal-contacto').classList.remove('hidden')"
                class="text-left text-brand-500 font-semibold">
                Contacto
            </button>
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.developers.index') }}" class="text-brand-500 font-semibold">Panel Admin</a>
                @endif
                @if (Auth::user()->role === 'cliente')
                    <a href="{{ route('client.dashboard') }}" class="text-brand-500 font-semibold">Mi Panel</a>
                @endif
                @if (Auth::user()->isDeveloper() && Auth::user()->developer)
                    <a href="{{ route('developer.profile.edit') }}" class="text-brand-500 font-semibold">Mi Perfil</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 font-semibold text-left">Salir</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="font-semibold">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="font-semibold">Registrarse</a>
            @endauth
        </div>
    </header>

    {{-- CONTENIDO --}}
    <main class="pt-16">
        @if (session('success'))
            <div
                class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-sm font-medium px-6 py-3 text-center">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-ink dark:bg-slate-950 text-white mt-24 py-12 transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="font-display text-lg font-semibold">Code<span class="text-brand-500">Bridge</span></p>
            <p class="text-slate-400 text-sm">© {{ date('Y') }} CodeBridge · Todos los derechos reservados</p>
        </div>
    </footer>

    {{-- MODAL CONTACTO --}}
    <div id="modal-contacto"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-brand-900/70">
        <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-2xl w-full max-w-lg p-8 relative">
            <button onclick="document.getElementById('modal-contacto').classList.add('hidden')"
                class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h3 class="font-display text-2xl font-extrabold text-ink dark:text-white mb-6">Formulario de contacto</h3>
            <form action="{{ route('contacto.enviar') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nombre</label>
                    <input type="text" name="nombre" placeholder="Escribe tu nombre..." required
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Correo
                        Electrónico</label>
                    <input type="email" name="email" placeholder="Escribe tu correo electrónico..." required
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Asunto</label>
                    <input type="text" name="asunto" placeholder="Escribe el asunto..." required
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Mensaje</label>
                    <textarea name="mensaje" rows="5" placeholder="Deja tu mensaje aquí..." required
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none"></textarea>
                </div>
                <button type="submit"
                    class="w-full bg-brand-500 hover:bg-brand-600 text-white font-bold py-3 rounded-xl transition-colors">
                    Enviar
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('modal-contacto').addEventListener('click', function(e) {
            if (e.target === this) this.classList.add('hidden');
        });

        document.querySelectorAll('#modal-contacto [required]').forEach(function(field) {
            field.addEventListener('invalid', function() {
                var labels = {
                    nombre: 'El nombre es obligatorio.',
                    email: 'El correo electrónico es obligatorio.',
                    asunto: 'El asunto es obligatorio.',
                    mensaje: 'El mensaje es obligatorio.'
                };
                this.setCustomValidity(labels[this.name] || 'Este campo es obligatorio.');
            });
            field.addEventListener('input', function() {
                this.setCustomValidity('');
            });
        });

        function toggleDark() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>

</body>

</html>
