<section class="space-y-6">
    <header>
        <h2 class="font-display font-bold text-lg text-red-600 dark:text-red-400">
            Eliminar cuenta
        </h2>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            Una vez eliminada tu cuenta, todos tus datos se borrarán permanentemente.
        </p>
    </header>

    <button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v3M4 7h16"/></svg>
        Eliminar cuenta
    </button>

    <div x-data="{ show: false }" x-show="show" @open-modal.window="if ($event.detail === 'confirm-user-deletion') show = true" @keydown.escape.window="show = false" @click.outside="show = false"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
         x-cloak>
        <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-2xl w-full max-w-md p-8 relative">
            <button @click="show = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <h3 class="font-display text-xl font-extrabold text-ink dark:text-white mb-2">¿Eliminar cuenta?</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Ingresá tu contraseña para confirmar que querés eliminar tu cuenta de forma permanente.</p>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf @method('delete')
                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Contraseña</label>
                    <input type="password" name="password" placeholder="Tu contraseña"
                           class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    @error('password', 'userDeletion') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="flex gap-3">
                    <button type="submit"
                            class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-xl transition-colors text-sm">
                        Eliminar
                    </button>
                    <button type="button" @click="show = false"
                            class="flex-1 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-semibold py-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors text-sm">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
