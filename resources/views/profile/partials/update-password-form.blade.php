<section>
    <header>
        <h2 class="font-display font-bold text-lg text-ink dark:text-white">
            Actualizar contraseña
        </h2>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            Asegurate de usar una contraseña segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Contraseña actual</label>
            <input type="password" name="current_password" autocomplete="current-password"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('current_password', 'updatePassword') border-red-400 @enderror">
            @error('current_password', 'updatePassword') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nueva contraseña</label>
            <input type="password" name="password" autocomplete="new-password"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('password', 'updatePassword') border-red-400 @enderror">
            @error('password', 'updatePassword') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            <ul class="text-xs text-slate-400 dark:text-slate-500 mt-2 space-y-1 list-disc list-inside">
                <li>Mínimo 8 caracteres</li>
                <li>Al menos una mayúscula</li>
                <li>Al menos un número</li>
                <li>Al menos un carácter especial (@$!%*?&)</li>
            </ul>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Confirmar nueva contraseña</label>
            <input type="password" name="password_confirmation" autocomplete="new-password"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                    class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">
                Guardar contraseña
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm font-medium text-green-600 dark:text-green-400">
                    Contraseña actualizada.
                </p>
            @endif
        </div>
    </form>
</section>
