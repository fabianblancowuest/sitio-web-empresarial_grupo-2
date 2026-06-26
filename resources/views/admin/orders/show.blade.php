@extends('admin.layouts.admin')
@section('title', $order->title . ' · Admin CodeBridge')

@section('content')

<div class="mb-8">
    <a href="{{ route('admin.orders.index') }}"
       class="inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-brand-600 transition-colors mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M15 19l-7-7 7-7"/></svg>
        Volver a pedidos
    </a>
    <h1 class="font-display text-2xl font-bold text-ink dark:text-white">{{ $order->title }}</h1>
    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
        Cliente: <strong>{{ $order->user->name }}</strong> &middot; {{ $order->user->email }}
    </p>
</div>

@if(session('success'))
<div class="mb-8 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 rounded-lg px-5 py-3 text-sm font-medium">
    {{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Columna izquierda: datos + cambio de estado --}}
    <div class="lg:col-span-1 space-y-6">

        {{-- Info del pedido --}}
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5 sm:p-6">
            <h2 class="font-display font-bold text-xs uppercase tracking-wide text-slate-400 mb-4">Detalles</h2>

            <dl class="space-y-3 text-sm">
                <div>
                    <dt class="text-xs text-slate-400 font-medium">Estado</dt>
                    <dd class="mt-0.5">
                        @php
                            $map = ['pendiente' => 'Pendiente', 'en_progreso' => 'En progreso', 'completado' => 'Completado', 'cancelado' => 'Cancelado'];
                            $colors = ['pendiente' => 'text-amber-600', 'en_progreso' => 'text-brand-600', 'completado' => 'text-green-600', 'cancelado' => 'text-red-600'];
                        @endphp
                        <span class="font-semibold {{ $colors[$order->status] ?? '' }}">{{ $map[$order->status] ?? $order->status }}</span>
                    </dd>
                </div>
                @if($order->price)
                <div>
                    <dt class="text-xs text-slate-400 font-medium">Precio</dt>
                    <dd class="mt-0.5 font-semibold">${{ number_format($order->price, 2) }}</dd>
                </div>
                @endif
                @if($order->deadline)
                <div>
                    <dt class="text-xs text-slate-400 font-medium">Fecha de entrega</dt>
                    <dd class="mt-0.5 font-semibold">{{ \Carbon\Carbon::parse($order->deadline)->format('d/m/Y') }}</dd>
                </div>
                @endif
                <div>
                    <dt class="text-xs text-slate-400 font-medium">Solicitado</dt>
                    <dd class="mt-0.5 font-semibold">{{ $order->created_at->format('d/m/Y H:i') }}</dd>
                </div>
            </dl>
        </div>

        {{-- Cambiar estado --}}
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5 sm:p-6">
            <h2 class="font-display font-bold text-xs uppercase tracking-wide text-slate-400 mb-4">Cambiar estado</h2>
            <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="space-y-4">
                @csrf
                <select name="status" class="w-full border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="pendiente"   {{ $order->status == 'pendiente'   ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_progreso" {{ $order->status == 'en_progreso' ? 'selected' : '' }}>En progreso</option>
                    <option value="completado"  {{ $order->status == 'completado'  ? 'selected' : '' }}>Completado</option>
                    <option value="cancelado"   {{ $order->status == 'cancelado'   ? 'selected' : '' }}>Cancelado</option>
                </select>
                <button type="submit" class="w-full bg-brand-500 hover:bg-brand-600 text-white font-semibold px-4 py-2.5 rounded-lg transition-colors text-sm">
                    Actualizar estado
                </button>
            </form>
        </div>

        {{-- Descripción --}}
        @if($order->description)
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-5 sm:p-6">
            <h2 class="font-display font-bold text-xs uppercase tracking-wide text-slate-400 mb-3">Descripción del proyecto</h2>
            <p class="text-sm text-slate-600 dark:text-slate-300 whitespace-pre-wrap">{{ $order->description }}</p>
        </div>
        @endif
    </div>

    {{-- Columna derecha: conversación --}}
    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden flex flex-col h-[600px]">
            <div class="px-5 sm:px-6 py-4 border-b border-slate-100 dark:border-slate-700">
                <h2 class="font-display font-bold text-ink dark:text-white">Conversación</h2>
            </div>

            {{-- Mensajes --}}
            <div class="flex-1 overflow-y-auto p-5 sm:p-6 space-y-4" id="messages-container">
                @forelse($order->messages as $msg)
                @php $isAdmin = $msg->user_id !== $order->user_id; @endphp
                <div class="flex {{ $isAdmin ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[80%] {{ $isAdmin ? 'bg-brand-500 text-white rounded-lg rounded-br-md' : 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 rounded-lg rounded-bl-md' }} px-4 py-3">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-semibold {{ $isAdmin ? 'text-white/80' : 'text-slate-400' }}">
                                {{ $isAdmin ? 'CodeBridge' : $msg->user->name }}
                            </span>
                            <span class="text-xs {{ $isAdmin ? 'text-white/60' : 'text-slate-400' }}">
                                {{ $msg->created_at->format('d/m H:i') }}
                            </span>
                        </div>
                        <p class="text-sm whitespace-pre-wrap">{{ $msg->message }}</p>
                    </div>
                </div>
                @empty
                <div class="flex items-center justify-center h-full">
                    <p class="text-slate-400 text-sm">Sin mensajes aún. Respondé al cliente para iniciar la conversación.</p>
                </div>
                @endforelse
            </div>

            {{-- Responder --}}
            <div class="border-t border-slate-100 dark:border-slate-700 px-5 sm:px-6 py-4">
                <form action="{{ route('admin.orders.message', $order) }}" method="POST" class="flex gap-3">
                    @csrf
                    <input type="text" name="message" placeholder="Escribí tu respuesta..." required
                           class="flex-1 border border-slate-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors text-sm shrink-0">
                        Enviar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const container = document.getElementById('messages-container');
    container.scrollTop = container.scrollHeight;
</script>
@endpush

@endsection
