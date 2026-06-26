@extends('layouts.app')
@section('title', 'Perfil · CodeBridge')

@section('content')
<section class="py-16 bg-slate-50 dark:bg-slate-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        <div class="mb-10">
            <span class="inline-flex items-center gap-2 text-xs font-semibold tracking-widest uppercase bg-brand-100 dark:bg-brand-900/30 text-brand-700 dark:text-brand-400 px-3 py-1.5 rounded-full mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-500"></span>
                Perfil de usuario
            </span>
            <h1 class="font-display text-3xl font-bold text-ink dark:text-white">
                {{ Auth::user()->name }}
            </h1>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">Administrá tu información personal y contraseña.</p>
        </div>

        <div class="space-y-6">
            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
                @include('profile.partials.update-password-form')
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6 sm:p-8">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</section>
@endsection
