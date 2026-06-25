<section>
    <header>
        <h2 class="font-display font-bold text-lg text-ink dark:text-white">
            Información del perfil
        </h2>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            Actualizá tu nombre y correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Foto de perfil</label>
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-full overflow-hidden bg-brand-100 dark:bg-brand-900/40 flex items-center justify-center shrink-0">
                    @if ($user->photo)
                        <img src="{{ asset($user->photo) }}" alt="Foto de perfil" class="w-full h-full object-cover">
                    @else
                        <span class="text-lg font-bold font-display text-brand-700 dark:text-brand-400">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    @endif
                </div>
                <div class="flex-1">
                    <label class="cursor-pointer inline-flex items-center gap-2 bg-brand-50 dark:bg-brand-900/20 text-brand-700 dark:text-brand-400 hover:bg-brand-100 dark:hover:bg-brand-900/40 font-semibold px-4 py-2 rounded-xl transition-colors text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M4 16l4.586-4.586a2 2 0 0 1 2.828 0L16 16m-2-2l1.586-1.586a2 2 0 0 1 2.828 0L20 14m-6-6h.01M6 20h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/>
                        </svg>
                        Subir foto
                        <input type="file" name="photo" accept="image/*" class="hidden">
                    </label>
                    <p class="text-xs text-slate-400 mt-1">JPG, PNG o GIF. Máximo 2 MB.</p>
                </div>
            </div>
            @error('photo') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('name') border-red-400 @enderror">
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('email') border-red-400 @enderror">
            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-sm text-amber-600 dark:text-amber-400">
                        Tu correo electrónico no está verificado.
                        <button form="send-verification" class="underline font-semibold hover:text-amber-700 dark:hover:text-amber-300 transition-colors">
                            Reenviar verificación
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                            Se ha enviado un nuevo enlace de verificación a tu correo.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                    class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">
                Guardar
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm font-medium text-green-600 dark:text-green-400">
                    Guardado.
                </p>
            @endif
        </div>
    </form>
</section>
