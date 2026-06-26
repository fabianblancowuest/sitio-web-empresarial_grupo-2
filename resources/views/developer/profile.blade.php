@extends('layouts.app')
@section('title', 'Mi Perfil · CodeBridge')

@section('content')

<section class="py-16 bg-slate-50 dark:bg-slate-900 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">

        <div class="mb-8">
            <span class="inline-flex items-center gap-2 text-xs font-semibold tracking-widest uppercase bg-teal-100 dark:bg-teal-900/30 text-teal-700 dark:text-teal-400 px-3 py-1.5 rounded-full mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                Panel de developer
            </span>
            <h1 class="font-display text-3xl font-bold text-ink dark:text-white">Mi perfil</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">Editá tu información pública en el sitio.</p>
        </div>

        @php
            $parts    = explode(' ', $developer->name);
            $initials = strtoupper(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
            $colors   = ['bg-brand-100 text-brand-700','bg-green-100 text-green-700','bg-amber-100 text-amber-700','bg-pink-100 text-pink-700','bg-purple-100 text-purple-700','bg-teal-100 text-teal-700'];
            $color    = $colors[$developer->id % count($colors)];
        @endphp
        <div class="flex items-center gap-4 mb-6 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-4">
            @if($developer->photo)
                <img src="{{ asset($developer->photo) }}" alt="{{ $developer->name }}"
                     class="w-14 h-14 rounded-lg object-cover shrink-0">
            @else
                <div class="w-14 h-14 rounded-lg {{ $color }} flex items-center justify-center text-xl font-display font-bold shrink-0">
                    {{ $initials }}
                </div>
            @endif
            <div class="flex-1 min-w-0">
                <h2 class="font-display text-lg font-bold text-ink dark:text-white">{{ $developer->name }}</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">{{ $developer->role ?? 'Sin rol asignado' }}</p>
                @if($developer->skills)
                <div class="flex flex-wrap gap-1.5 mt-2">
                    @foreach(array_slice(explode(',', $developer->skills), 0, 4) as $skill)
                    <span class="text-xs px-2 py-0.5 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-md">{{ trim($skill) }}</span>
                    @endforeach
                </div>
                @endif
            </div>
            <a href="{{ route('developers.show', $developer) }}"
               class="shrink-0 text-xs font-semibold text-brand-500 hover:text-brand-600 border border-brand-200 dark:border-brand-800 px-3 py-1.5 rounded-lg hover:bg-brand-50 dark:hover:bg-brand-900/20 transition-colors">
                Ver público &rarr;
            </a>
        </div>

        <form action="{{ route('developer.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PATCH')

            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5 space-y-4">
                <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400">Información personal</h2>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nombre <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $developer->name) }}"
                               class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('name') border-red-400 @enderror">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Rol / Especialidad</label>
                        <input type="text" name="role" value="{{ old('role', $developer->role) }}" placeholder="Ej: Desarrollador Full Stack"
                               class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Email de contacto</label>
                    <input type="email" name="email" value="{{ old('email', $developer->email) }}" placeholder="nombre@codebridge.com"
                           class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Foto de perfil</label>
                    <label for="photo-input" class="cursor-pointer inline-flex items-center gap-2 bg-brand-50 dark:bg-brand-900/20 text-brand-700 dark:text-brand-400 hover:bg-brand-100 dark:hover:bg-brand-900/40 font-semibold px-4 py-2 rounded-lg transition-colors text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M4 16l4.586-4.586a2 2 0 0 1 2.828 0L16 16m-2-2l1.586-1.586a2 2 0 0 1 2.828 0L20 14m-6-6h.01M6 20h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/>
                        </svg>
                        Elegir foto
                    </label>
                    <input type="file" name="photo" accept="image/*" id="photo-input" class="hidden">
                    <p class="text-xs text-slate-400 mt-1">JPG, PNG o WEBP &middot; máx. 2 MB</p>
                    <div id="photo-preview" class="hidden mt-3">
                        <img id="preview-img" src="" alt="Vista previa" class="w-14 h-14 rounded-lg object-cover border-2 border-brand-200">
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5 space-y-4">
                <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400">Perfil público</h2>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Habilidades</label>
                    <input type="text" name="skills" value="{{ old('skills', $developer->skills) }}" placeholder="Ej: React, Laravel, MySQL"
                           class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <p class="text-xs text-slate-400 mt-1">Separadas por coma</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Bio</label>
                    <textarea name="bio" rows="4" placeholder="Contá algo sobre vos..."
                              class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none">{{ old('bio', $developer->bio) }}</textarea>
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                    Guardar cambios
                </button>
                <a href="{{ route('dashboard') }}" class="border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-semibold px-5 py-2.5 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors text-sm">
                    Cancelar
                </a>
            </div>
        </form>

    </div>
</section>

<script>
    document.getElementById('photo-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = ev => {
            document.getElementById('preview-img').src = ev.target.result;
            document.getElementById('photo-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    });
</script>

@endsection
