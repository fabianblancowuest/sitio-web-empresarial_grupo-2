<!DOCTYPE html>
<html lang="es" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar correo · CodeBridge</title>
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
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Verificá tu correo electrónico</p>
        </div>

        {{-- Card --}}
        <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 p-8 shadow-sm">

            <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-6">
                {{ __('¡Gracias por registrarte! Para completar tu registro, por favor verificá tu dirección de correo electrónico haciendo clic en el enlace que te hemos enviado. Si no recibiste el correo, con gusto te enviaremos uno nuevo.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-sm px-4 py-3 rounded-xl">
                    {{ __('Se ha enviado un nuevo enlace de verificación al correo electrónico que proporcionaste durante el registro.') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-brand-500 hover:bg-brand-600 text-white font-semibold py-3 rounded-xl transition-colors">
                    Reenviar correo de verificación
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit"
                    class="w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-semibold py-3 rounded-xl transition-colors">
                    Cerrar sesión
                </button>
            </form>
        </div>

        <p class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                ← Volver al inicio
            </a>
        </p>

    </div>

</body>

</html>
