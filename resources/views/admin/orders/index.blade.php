@extends('admin.layouts.admin')
@section('title', 'Pedidos · Admin CodeBridge')

@section('content')

<div class="flex items-start justify-between mb-8">
    <div>
        <h1 class="font-display text-2xl font-extrabold text-ink dark:text-white">Pedidos</h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">{{ $orders->count() }} proyecto{{ $orders->count() !== 1 ? 's' : '' }} en total</p>
    </div>
    <a href="{{ route('admin.orders.create') }}"
       class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-600 text-white font-semibold px-4 py-2.5 rounded-xl transition-colors text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
        Nuevo pedido
    </a>
</div>

@php
    $statusConfig = [
        'pendiente'   => ['label' => 'Pendiente',    'class' => 'bg-amber-50  dark:bg-amber-900/20  text-amber-700  dark:text-amber-400  border border-amber-200  dark:border-amber-800'],
        'en_progreso' => ['label' => 'En progreso',  'class' => 'bg-brand-50  dark:bg-brand-900/20  text-brand-700  dark:text-brand-400  border border-brand-200  dark:border-brand-800'],
        'completado'  => ['label' => 'Completado',   'class' => 'bg-green-50  dark:bg-green-900/20  text-green-700  dark:text-green-400  border border-green-200  dark:border-green-800'],
        'cancelado'   => ['label' => 'Cancelado',    'class' => 'bg-red-50    dark:bg-red-900/20    text-red-700    dark:text-red-400    border border-red-200    dark:border-red-800'],
    ];
@endphp

<div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-slate-100 dark:border-slate-700">
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Cliente</th>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Proyecto</th>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Estado</th>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Precio</th>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Entrega</th>
                <th class="px-6 py-3.5"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
            @forelse($orders as $order)
            @php $cfg = $statusConfig[$order->status] ?? ['label' => $order->status, 'class' => 'bg-slate-100 text-slate-600']; @endphp
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/40 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 flex items-center justify-center text-xs font-bold font-display shrink-0">
                            {{ strtoupper(substr($order->user->name ?? '?', 0, 1)) }}
                        </div>
                        <span class="font-medium text-ink dark:text-white">{{ $order->user->name ?? '—' }}</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <p class="font-medium text-slate-700 dark:text-slate-200">{{ $order->title }}</p>
                    @if($order->description)
                    <p class="text-xs text-slate-400 mt-0.5 line-clamp-1">{{ $order->description }}</p>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <span class="inline-block px-2.5 py-1 rounded-lg text-xs font-semibold {{ $cfg['class'] }}">
                        {{ $cfg['label'] }}
                    </span>
                </td>
                <td class="px-6 py-4 text-slate-500 dark:text-slate-400 font-medium">
                    {{ $order->price ? '$' . number_format($order->price, 2) : '—' }}
                </td>
                <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                    {{ $order->deadline ? \Carbon\Carbon::parse($order->deadline)->format('d/m/Y') : '—' }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.orders.edit', $order) }}"
                           class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-brand-600 dark:text-brand-400 bg-brand-50 dark:bg-brand-900/20 hover:bg-brand-100 dark:hover:bg-brand-900/40 rounded-xl transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.414-9.414a2 2 0 1 1 2.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Editar
                        </a>
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar este pedido?')">
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
                <td colspan="6" class="px-6 py-16 text-center">
                    <div class="flex flex-col items-center gap-3 text-slate-400">
                        <svg class="w-10 h-10 opacity-40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2"/>
                        </svg>
                        <p class="font-display font-bold text-slate-500 dark:text-slate-400">Sin pedidos todavía</p>
                        <a href="{{ route('admin.orders.create') }}" class="text-brand-500 text-sm font-semibold hover:underline">Crear el primero</a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection