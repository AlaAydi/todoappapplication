@extends('layouts.app')

@section('header')
    <h2 class="text-3xl font-bold text-white tracking-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="premium-card text-center py-12">
        <div class="w-24 h-24 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-white mb-4">Bienvenue, {{ Auth::user()->name }} !</h3>
        <p class="text-slate-400 max-w-lg mx-auto mb-10 text-lg">
            Votre espace de productivité premium est prêt. Commencez à organiser vos tâches dès maintenant pour atteindre vos objectifs.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('tasks.index') }}" class="premium-button px-8">
                Voir mes tâches
            </a>
            <a href="{{ route('tasks.create') }}" class="px-8 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-semibold transition-all backdrop-blur-sm border border-white/10">
                Nouvelle tâche
            </a>
        </div>
    </div>
@endsection
