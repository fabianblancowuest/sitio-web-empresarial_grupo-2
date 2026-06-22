@extends('admin.layouts.admin')
@section('title', 'Desarrolladores · Admin CodeBridge')

@section('content')

<div class="flex items-start justify-between mb-8">
    <div>
        <h1 class="font-display text-2xl font-extrabold text-ink dark:text-white">Desarrolladores</h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">{{ $developers->count() }} miembro{{ $developers->count() !== 1 ? 's' : '' }} en el equipo</p>
    </div>
    <a href="{{ route('admin.developers.create') }}"
       class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-600 text-white font-semibold px-4 py-2.5 rounded-xl transition-colors text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
        Agregar desarrollador
    </a>
</div>

<div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-slate-100 dark:border-slate-700">
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Desarrollador</th>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Rol</th>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Email</th>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Habilidades</th>
                <th class="px-6 py-3.5"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
            @forelse($developers as $developer)
            @php
                $parts    = explode(' ', $developer->name);
                $initials = strtoupper(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
                $colors   = ['bg-brand-100 text-brand-700','bg-green-100 text-green-700','bg-amber-100 text-amber-700','bg-pink-100 text-pink-700','bg-purple-100 text-purple-700','bg-teal-100 text-teal-700'];
                $color    = $colors[$developer->id % count($colors)];
            @endphp
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/40 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        @if($developer->photo)
                            <img src="{{ asset($developer->photo) }}"
                                 alt="{{ $developer->name }}"
                                 class="w-10 h-10 rounded-full object-cover shrink-0 border border-slate-200 dark:border-slate-600"
                                 style="object-position: center top;">
                        @else
                            <div class="w-10 h-10 rounded-full {{ $color }} flex items-center justify-center text-xs font-bold font-display shrink-0">
                                {{ $initials }}
                            </div>
                        @endif
                        <div>
                            <p class="font-semibold text-ink dark:text-white leading-none">{{ $developer->name }}</p>
                            @if($developer->user)
                            <p class="text-xs text-slate-400 mt-0.5">cuenta vinculada</p>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-slate-500 dark:text-slate-400">{{ $developer->role ?? '—' }}</td>
                <td class="px-6 py-4 text-slate-500 dark:text-slate-400">{{ $developer->email ?? '—' }}</td>
                <td class="px-6 py-4">
                    @if($developer->skills)
                    <div class="flex flex-wrap gap-1">
                        @foreach(array_slice(explode(',', $developer->skills), 0, 2) as $skill)
                        <span class="text-xs px-2 py-0.5 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-md">{{ trim($skill) }}</span>
                        @endforeach
                        @if(count(explode(',', $developer->skills)) > 2)
                        <span class="text-xs text-slate-400">+{{ count(explode(',', $developer->skills)) - 2 }}</span>
                        @endif
                    </div>
                    @else
                    <span class="text-slate-400">—</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.developers.edit', $developer) }}"
                           class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-brand-600 dark:text-brand-400 bg-brand-50 dark:bg-brand-900/20 hover:bg-brand-100 dark:hover:bg-brand-900/40 rounded-xl transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.414-9.414a2 2 0 1 1 2.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Editar
                        </a>
                        <form action="{{ route('admin.developers.destroy', $developer) }}" method="POST"
                              onsubmit="return confirm('¿Seguro que querés eliminar a {{ $developer->name }}?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/20 hover:bg-red-100 dark:hover:bg-red-900/40 rounded-xl transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v3M4 7h16"/></svg>
                                Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-16 text-center">
                    <div class="flex flex-col items-center gap-3 text-slate-400">
                        <svg class="w-10 h-10 opacity-40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M17 20h5v-1a4 4 0 0 0-4-4h-1M9 20H4v-1a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v1H9zm4-10a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                        </svg>
                        <p class="font-display font-bold text-slate-500 dark:text-slate-400">Sin desarrolladores todavía</p>
                        <a href="{{ route('admin.developers.create') }}" class="text-brand-500 text-sm font-semibold hover:underline">Agregar el primero</a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection