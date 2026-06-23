<!DOCTYPE html>
<html lang="es" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse · CodeBridge</title>
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

    <div class="w-full max-w-md px-6 py-12">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="flex flex-col items-center gap-2">
                <img src="{{ asset('favicon.png') }}" alt="CodeBridge" class="h-16 w-auto">
                <span class="font-display text-3xl font-extrabold text-ink dark:text-white">
                    Code<span class="text-brand-500">Bridge</span>
                </span>
            </a>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Creá tu cuenta</p>
        </div>

        {{-- Card --}}
        <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 p-8 shadow-sm">
            <form method="POST" action="{{ route('register') }}" class="space-y-5" enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Foto de perfil <span class="text-slate-400 font-normal">(opcional)</span></label>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-full overflow-hidden bg-brand-100 dark:bg-brand-900/40 flex items-center justify-center shrink-0">
                            <span class="text-lg font-bold font-display text-brand-700 dark:text-brand-400" id="preview-initial">📷</span>
                            <img id="preview-image" class="hidden w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <input type="file" name="photo" accept="image/*" id="photo-input"
                                   class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-brand-50 dark:file:bg-brand-900/20 file:text-brand-700 dark:file:text-brand-400 hover:file:bg-brand-100 dark:hover:file:bg-brand-900/40 transition-colors">
                            <p class="text-xs text-slate-400 mt-1">JPG, PNG o GIF. Máximo 2 MB.</p>
                        </div>
                    </div>
                    @error('photo') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nombre</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                        placeholder="Tu nombre completo"
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('name') border-red-400 @enderror">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Correo electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        placeholder="tucorreo@ejemplo.com"
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('email') border-red-400 @enderror">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Contraseña</label>
                    <input type="password" name="password" required
                        placeholder="Mínimo 8 caracteres"
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('password') border-red-400 @enderror">
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
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" required
                        placeholder="Repetí tu contraseña"
                        class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <button type="submit"
                    class="w-full bg-brand-500 hover:bg-brand-600 text-white font-semibold py-3 rounded-xl transition-colors">
                    Crear cuenta
                </button>
            </form>
        </div>

        <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-6">
            ¿Ya tenés cuenta?
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

<script>
    document.getElementById('photo-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const img = document.getElementById('preview-image');
                const initial = document.getElementById('preview-initial');
                img.src = ev.target.result;
                img.classList.remove('hidden');
                initial.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>

</body>

</html>