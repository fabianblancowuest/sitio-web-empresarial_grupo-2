<!DOCTYPE html>
<html lang="es" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña · CodeBridge</title>
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
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Restablecé tu contraseña</p>
        </div>

        {{-- Card --}}
        <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 p-8 shadow-sm">

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                        Correo electrónico
                    </label>
                    <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                        placeholder="tucorreo@ejemplo.com"
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('email') border-red-400 @enderror">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                        Nueva contraseña
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="reset_password" required autocomplete="new-password"
                            placeholder="Mínimo 8 caracteres"
                            class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('password') border-red-400 @enderror">
                        <button type="button" onclick="togglePassword('reset_password', this)"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                            <svg class="w-5 h-5 eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg class="w-5 h-5 eye-closed hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <ul class="text-xs text-slate-400 dark:text-slate-500 mt-2 space-y-1 list-disc list-inside">
                        <li>Mínimo 8 caracteres</li>
                        <li>Al menos una mayúscula</li>
                        <li>Al menos un número</li>
                        <li>Al menos un carácter especial (@$!%*?&)</li>
                    </ul>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                        Confirmar nueva contraseña
                    </label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="reset_password_confirmation" required autocomplete="new-password"
                            placeholder="Repetí tu contraseña"
                            class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                        <button type="button" onclick="togglePassword('reset_password_confirmation', this)"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                            <svg class="w-5 h-5 eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg class="w-5 h-5 eye-closed hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-brand-500 hover:bg-brand-600 text-white font-semibold py-3 rounded-xl transition-colors">
                    Restablecer contraseña
                </button>
            </form>
        </div>

        <p class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-sm text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                ← Volver a iniciar sesión
            </a>
        </p>

    </div>

    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            if (input.type === 'password') {
                input.type = 'text';
                btn.querySelector('.eye-open').classList.add('hidden');
                btn.querySelector('.eye-closed').classList.remove('hidden');
            } else {
                input.type = 'password';
                btn.querySelector('.eye-closed').classList.add('hidden');
                btn.querySelector('.eye-open').classList.remove('hidden');
            }
        }
    </script>

</body>

</html>
