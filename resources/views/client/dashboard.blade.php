@extends('layouts.app')
@section('title', 'Mis proyectos · CodeBridge')

@section('content')

<section class="py-16 bg-slate-50 dark:bg-slate-900 min-h-screen">
    <div class="max-w-5xl mx-auto px-6">

        {{-- Encabezado --}}
        <div class="mb-10">
            <span class="inline-flex items-center gap-2 text-xs font-semibold tracking-widest uppercase bg-brand-100 dark:bg-brand-900/30 text-brand-700 dark:text-brand-400 px-3 py-1.5 rounded-full mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-500"></span>
                Panel de cliente
            </span>
            <h1 class="font-display text-4xl font-extrabold text-ink dark:text-white">
                Hola, {{ Auth::user()->name }}
            </h1>
            <p class="text-slate-500 dark:text-slate-400 mt-2">Acá podés ver el estado de tus proyectos contratados.</p>
        </div>

        @if(session('success'))
        <div class="mb-8 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 rounded-xl px-5 py-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        @endif

        {{-- Stats --}}
        @php
            $total      = $orders->count();
            $pendiente  = $orders->where('status', 'pendiente')->count();
            $progreso   = $orders->where('status', 'en_progreso')->count();
            $completado = $orders->where('status', 'completado')->count();
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-10">
            <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 px-5 py-4">
                <p class="font-display text-3xl font-extrabold text-ink dark:text-white">{{ $total }}</p>
                <p class="text-xs font-medium text-slate-500 dark:text-slate-400 mt-1">Total</p>
            </div>
            <div class="bg-amber-50 dark:bg-amber-900/20 rounded-2xl border border-amber-100 dark:border-amber-800/40 px-5 py-4">
                <p class="font-display text-3xl font-extrabold text-amber-700 dark:text-amber-400">{{ $pendiente }}</p>
                <p class="text-xs font-medium text-amber-600 dark:text-amber-500 mt-1">Pendientes</p>
            </div>
            <div class="bg-brand-50 dark:bg-brand-900/20 rounded-2xl border border-brand-100 dark:border-brand-800/40 px-5 py-4">
                <p class="font-display text-3xl font-extrabold text-brand-700 dark:text-brand-400">{{ $progreso }}</p>
                <p class="text-xs font-medium text-brand-600 dark:text-brand-500 mt-1">En progreso</p>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 rounded-2xl border border-green-100 dark:border-green-800/40 px-5 py-4">
                <p class="font-display text-3xl font-extrabold text-green-700 dark:text-green-400">{{ $completado }}</p>
                <p class="text-xs font-medium text-green-600 dark:text-green-500 mt-1">Completados</p>
            </div>
        </div>

        {{-- Lista de pedidos --}}
        <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700 flex items-center justify-between">
                <h2 class="font-display font-bold text-ink dark:text-white">Mis proyectos</h2>
                <div class="flex items-center gap-3">
                    <span class="text-xs text-slate-400">{{ $total }} proyecto{{ $total !== 1 ? 's' : '' }}</span>
                    <button onclick="document.getElementById('modal-proyecto').classList.remove('hidden')"
                            class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-4 py-2 rounded-xl transition-colors text-sm">
                        + Solicitar proyecto
                    </button>
                </div>
            </div>

            @if($orders->isEmpty())
                <div class="px-6 py-16 text-center">
                    <div class="w-14 h-14 rounded-2xl bg-slate-100 dark:bg-slate-700 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2"/>
                        </svg>
                    </div>
                    <p class="font-display font-bold text-lg text-ink dark:text-white">No tenés proyectos aún</p>
                    <p class="text-slate-400 text-sm mt-1 mb-5">Contactanos para empezar tu primer proyecto.</p>
                    <button onclick="document.getElementById('modal-proyecto').classList.remove('hidden')"
                            class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-xl transition-colors text-sm">
                        Solicitar proyecto
                    </button>
                </div>
            @else
            @php
                $statusConfig = [
                    'pendiente'   => ['label' => 'Pendiente',   'class' => 'bg-amber-50  dark:bg-amber-900/20  text-amber-700  dark:text-amber-400  border border-amber-200  dark:border-amber-800'],
                    'en_progreso' => ['label' => 'En progreso', 'class' => 'bg-brand-50  dark:bg-brand-900/20  text-brand-700  dark:text-brand-400  border border-brand-200  dark:border-brand-800'],
                    'completado'  => ['label' => 'Completado',  'class' => 'bg-green-50  dark:bg-green-900/20  text-green-700  dark:text-green-400  border border-green-200  dark:border-green-800'],
                    'cancelado'   => ['label' => 'Cancelado',   'class' => 'bg-red-50    dark:bg-red-900/20    text-red-700    dark:text-red-400    border border-red-200    dark:border-red-800'],
                ];
            @endphp
            <div class="divide-y divide-slate-100 dark:divide-slate-700">
                @foreach($orders as $order)
                @php $cfg = $statusConfig[$order->status] ?? ['label' => $order->status, 'class' => 'bg-slate-100 text-slate-600']; @endphp
                <div class="order-item">
                    {{-- Cabecera clickeable --}}
                    <button onclick="toggleOrder({{ $order->id }})" class="w-full text-left px-6 py-5 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">
                        <div class="flex-1 min-w-0">
                            <h3 class="font-display font-bold text-ink dark:text-white">{{ $order->title }}</h3>
                            @if($order->description)
                            <p class="text-slate-500 dark:text-slate-400 text-sm mt-1 line-clamp-1">{{ $order->description }}</p>
                            @endif
                            <div class="flex flex-wrap gap-4 mt-3 text-xs text-slate-400">
                                @if($order->price)
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>
                                    ${{ number_format($order->price, 2) }}
                                </span>
                                @endif
                                @if($order->deadline)
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/></svg>
                                    Entrega: {{ \Carbon\Carbon::parse($order->deadline)->format('d/m/Y') }}
                                </span>
                                @endif
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>
                                    {{ $order->created_at->format('d/m/Y') }}
                                </span>
                                @if($order->messages->count() > 0)
                                <span class="flex items-center gap-1 text-brand-500">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    {{ $order->messages->count() }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-3 shrink-0">
                            <span class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ $cfg['class'] }}">
                                {{ $cfg['label'] }}
                            </span>
                            <svg class="w-4 h-4 text-slate-400 transition-transform" id="chevron-{{ $order->id }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </button>

                    {{-- Conversación (oculta por defecto) --}}
                    <div id="conversation-{{ $order->id }}" class="hidden border-t border-slate-100 dark:border-slate-700">
                        <div class="px-6 py-4 bg-slate-50/50 dark:bg-slate-800/50">
                            @forelse($order->messages as $i => $msg)
                            @php $isClient = $msg->user_id === Auth::id(); @endphp
                            <div class="flex {{ $isClient ? 'justify-end' : 'justify-start' }} mb-3 last:mb-0">
                                <div class="max-w-[80%] {{ $isClient ? 'bg-brand-500 text-white rounded-2xl rounded-br-md' : 'bg-white dark:bg-slate-700 text-slate-700 dark:text-slate-200 rounded-2xl rounded-bl-md border border-slate-200 dark:border-slate-600' }} px-4 py-3">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-xs font-semibold {{ $isClient ? 'text-white/80' : 'text-slate-400' }}">
                                            {{ $isClient ? 'Vos' : 'CodeBridge' }}
                                        </span>
                                        <span class="text-xs {{ $isClient ? 'text-white/60' : 'text-slate-400' }}">
                                            {{ $msg->created_at->format('d/m H:i') }}
                                        </span>
                                    </div>
                                    <p class="text-sm whitespace-pre-wrap">{{ $msg->message }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="text-sm text-slate-400 text-center py-4">No hay mensajes aún.</p>
                            @endforelse
                        </div>

                        {{-- Responder --}}
                        <div class="border-t border-slate-100 dark:border-slate-700 px-6 py-4 bg-white dark:bg-slate-800">
                            <form action="{{ route('client.messages.store', $order) }}" method="POST" class="flex gap-3">
                                @csrf
                                <input type="text" name="message" placeholder="Escribí tu mensaje..." required
                                       class="flex-1 border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                                <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-xl transition-colors text-sm shrink-0">
                                    Enviar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

    </div>
</section>

@push('scripts')
<script>
function toggleOrder(id) {
    const el = document.getElementById('conversation-' + id);
    const chevron = document.getElementById('chevron-' + id);
    el.classList.toggle('hidden');
    chevron.classList.toggle('rotate-180');
}
</script>
@endpush

{{-- Modal Solicitar Proyecto --}}
<div id="modal-proyecto" class="fixed inset-0 z-50 hidden bg-black/40 backdrop-blur-sm flex items-center justify-center p-4" onclick="if(event.target===this) this.classList.add('hidden')">
    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between px-6 pt-6 pb-4 border-b border-slate-100 dark:border-slate-700">
            <h3 class="font-display font-bold text-lg text-ink dark:text-white">Solicitar proyecto</h3>
            <button onclick="document.getElementById('modal-proyecto').classList.add('hidden')" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 6l12 12M18 6l-12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('client.projects.store') }}" method="POST" class="p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Tu correo</label>
                <input type="email" value="{{ Auth::user()->email }}" readonly
                       class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm bg-slate-50 dark:bg-slate-700/50 cursor-not-allowed">
                <p class="text-xs text-slate-400 mt-1">Usaremos tu correo registrado para contactarte.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Nombre del proyecto <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Ej: Tienda online de ropa" required
                       class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 @error('title') border-red-400 @enderror">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Descripción</label>
                <textarea name="description" rows="4" placeholder="Contanos en detalle qué necesitas..."
                          class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none @error('description') border-red-400 @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors text-sm flex-1">
                    Enviar solicitud
                </button>
                <button type="button" onclick="document.getElementById('modal-proyecto').classList.add('hidden')"
                        class="border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-semibold px-6 py-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors text-sm">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection