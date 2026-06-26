<x-guest-layout>
    <div class="mb-4 text-sm text-slate-600 dark:text-slate-400">
        {{ __('Esta es un área segura. Confirmá tu contraseña antes de continuar.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-sm font-medium text-slate-700 dark:text-slate-300" />
            <x-text-input id="password" class="block mt-1 w-full rounded-lg border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white text-sm"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                {{ __('Confirmar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
