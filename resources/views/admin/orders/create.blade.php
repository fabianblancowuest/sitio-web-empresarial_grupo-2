@extends('admin.layouts.admin')
@section('title', 'Nuevo Pedido · Admin CodeBridge')

@section('content')

<div class="mb-8">
    <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-brand-500 transition-colors mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M15 19l-7-7 7-7"/></svg>
        Volver a pedidos
    </a>
    <h1 class="font-display text-2xl font-extrabold text-ink dark:text-white">Nuevo pedido</h1>
    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Completá los datos del proyecto</p>
</div>

<div class="max-w-2xl">
    <form action="{{ route('admin.orders.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 space-y-5">
            <h2 class="font-display font-bold text-ink dark:text-white text-sm uppercase tracking-wide text-slate-500 dark:text-slate-400">Datos del proyecto</h2>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Cliente <span class="text-red-500">*</span></label>
                <select name="user_id" class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('user_id') border-red-400 @enderror">
                    <option value="">Seleccioná un cliente</option>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('user_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }} — {{ $client->email }}
                    </option>
                    @endforeach
                </select>
                @error('user_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Título del proyecto <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Ej: Tienda online de ropa"
                       class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('title') border-red-400 @enderror">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Descripción</label>
                <textarea name="description" rows="3" placeholder="Detalles del proyecto..."
                          class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 p-6 space-y-5">
            <h2 class="font-display font-bold text-sm uppercase tracking-wide text-slate-400">Estado y condiciones</h2>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Estado <span class="text-red-500">*</span></label>
                <select name="status" class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="pendiente"   {{ old('status') == 'pendiente'   ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_progreso" {{ old('status') == 'en_progreso' ? 'selected' : '' }}>En progreso</option>
                    <option value="completado"  {{ old('status') == 'completado'  ? 'selected' : '' }}>Completado</option>
                    <option value="cancelado"   {{ old('status') == 'cancelado'   ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Precio (USD)</label>
                    <input type="number" name="price" value="{{ old('price') }}" placeholder="0.00" step="0.01"
                           class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Fecha de entrega</label>
                    <input type="date" name="deadline" value="{{ old('deadline') }}"
                           class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm">
                Crear pedido
            </button>
            <a href="{{ route('admin.orders.index') }}" class="border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-semibold px-6 py-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors text-sm">
                Cancelar
            </a>
        </div>
    </form>
</div>

@endsection