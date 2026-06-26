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
                        brand: { 50: '#f0f4ff', 100: '#dde6ff', 500: '#4f6ef7', 600: '#3b57e8', 700: '#2c42c7', 900: '#1a2660' },
                        ink: '#0f172a',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-slate-50 dark:bg-slate-900 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-sm">

        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="flex flex-col items-center gap-2">
                <img src="{{ asset('favicon.png') }}" alt="CodeBridge" class="h-12 w-auto">
                <span class="font-display text-2xl font-bold text-ink dark:text-white">
                    Code<span class="text-brand-500">Bridge</span>
                </span>
            </a>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Verificá tu correo</p>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 p-6 shadow-sm">

            <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-5">
                {{ __('Gracias por registrarte. Para completar el registro, verificá tu correo haciendo clic en el enlace que te enviamos.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-5 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-sm px-4 py-3 rounded-lg">
                    {{ __('Se ha enviado un nuevo enlace de verificación a tu correo.') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-brand-500 hover:bg-brand-600 text-white font-semibold py-2.5 rounded-lg transition-colors text-sm">
                    Reenviar verificación
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit"
                    class="w-full border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 font-semibold py-2.5 rounded-lg transition-colors text-sm">
                    Cerrar sesión
                </button>
            </form>
        </div>

        <p class="text-center mt-5">
            <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                &larr; Volver al inicio
            </a>
        </p>

    </div>

</body>

</html>
