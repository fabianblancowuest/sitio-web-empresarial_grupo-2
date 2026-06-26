@extends('admin.layouts.admin')
@section('title', 'Agregar Desarrollador · Admin CodeBridge')

@section('content')

<div class="mb-8">
    <a href="{{ route('admin.developers.index') }}"
       class="text-sm text-slate-500 hover:text-brand-500 transition-colors">&larr; Volver</a>
    <h1 class="font-display text-xl sm:text-2xl font-bold text-ink dark:text-white mt-2">Agregar Desarrollador</h1>
</div>

<div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-100 dark:border-slate-700 p-5 sm:p-8 max-w-2xl">
    <form action="{{ route('admin.developers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nombre <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Ej: Fabián Blanco Wuest"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('name') border-red-400 @enderror">
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Rol</label>
            <input type="text" name="role" value="{{ old('role') }}" placeholder="Ej: Desarrollador Full Stack"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Ej: fabian@codebridge.com"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Foto de perfil</label>
            <input type="file" name="photo" accept="image/*" id="photo-input"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
            <p class="text-xs text-slate-400 mt-1">JPG, PNG o WEBP &middot; máx. 2 MB</p>
            @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            <div id="photo-preview" class="hidden mt-3">
                <img id="preview-img" src="" alt="Vista previa"
                     class="w-20 h-20 rounded-full object-cover border-2 border-brand-200 shadow">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Habilidades</label>
            <input type="text" name="skills" value="{{ old('skills') }}" placeholder="Ej: React, Laravel, MySQL"
                   class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            <p class="text-xs text-slate-400 mt-1">Separadas por coma</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Bio</label>
            <textarea name="bio" rows="4" placeholder="Descripción del developer..."
                      class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none">{{ old('bio') }}</textarea>
        </div>

        <div class="border-t border-slate-100 dark:border-slate-700 pt-5">
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                Vincular cuenta de usuario <span class="text-slate-400 font-normal">(opcional)</span>
            </label>
            <select name="user_id"
                    class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                <option value="">Sin cuenta vinculada</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
                @endforeach
            </select>
            <p class="text-xs text-slate-400 mt-1">Solo aparecen usuarios con rol "developer" sin perfil asignado.</p>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit"
                    class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm">
                Guardar developer
            </button>
            <a href="{{ route('admin.developers.index') }}"
               class="border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-semibold px-5 py-2.5 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors text-sm">
                Cancelar
            </a>
        </div>
    </form>
</div>

<script>
    document.getElementById('photo-input').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (ev) {
            document.getElementById('preview-img').src = ev.target.result;
            document.getElementById('photo-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    });
</script>

@endsection
