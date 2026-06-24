<!DOCTYPE html>
<html lang="es" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña · CodeBridge</title>
    <script>
        if (localStorage.getItem('theme') === 'dark' ||
            (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f4ff',
                            100: '#dde6ff',
                            500: '#4f6ef7',
                            600: '#3b57e8',
                            700: '#2c42c7',
                            900: '#1a2660'
                        },
                        ink: '#0f172a',
                    },
                    fontFamily: {
                        sans: ['"DM Sans"', 'sans-serif'],
                        display: ['"Syne"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-slate-50 dark:bg-slate-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-6">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="flex flex-col items-center gap-2">
                <img src="{{ asset('favicon.png') }}" alt="CodeBridge" class="h-16 w-auto">
                <span class="font-display text-3xl font-extrabold text-ink dark:text-white">
                    Code<span class="text-brand-500">Bridge</span>
                </span>
            </a>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Recuperá tu contraseña</p>
        </div>

        {{-- Card --}}
        <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 p-8 shadow-sm">

            <p class="text-sm text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                ¿Olvidaste tu contraseña? No hay problema. Ingresá tu correo electrónico y te enviaremos un enlace para restablecerla.
            </p>

            @if (session('status'))
            <div class="mb-4 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-sm px-4 py-3 rounded-xl">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                        Correo electrónico
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="tucorreo@ejemplo.com"
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('email') border-red-400 @enderror">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-brand-500 hover:bg-brand-600 text-white font-semibold py-3 rounded-xl transition-colors">
                    Enviar enlace de recuperación
                </button>
            </form>
        </div>

        {{-- Link a login --}}
        <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-6">
            ¿Recordaste tu contraseña?
            <a href="{{ route('login') }}" class="text-brand-500 hover:text-brand-600 font-semibold transition-colors">
                Iniciar sesión
            </a>
        </p>

        <p class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                ← Volver al inicio
            </a>
        </p>

    </div>

</body>

</html>
