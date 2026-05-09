@extends('layouts.app')

@section('header')
<div class="max-w-2xl mx-auto">
    <h2 class="text-4xl font-extrabold text-white tracking-tight">
        Nouvelle <span class="text-indigo-400">Tâche</span>
    </h2>
    <p class="text-slate-400 mt-2 text-lg">Définissez vos objectifs pour aujourd'hui.</p>
</div>
@endsection

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="premium-card relative overflow-visible">
        <div class="absolute -top-6 -right-6 w-24 h-24 bg-indigo-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-purple-500/20 rounded-full blur-3xl"></div>
        
        <form action="{{ route('tasks.store') }}" method="POST" class="relative z-10">
            @csrf

            <div class="mb-8">
                <label for="title" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">Titre du projet</label>
                <input type="text" id="title" name="title" 
                    class="premium-input @error('title') border-red-500/50 @enderror" 
                    placeholder="Ex: Finaliser le rapport annuel"
                    value="{{ old('title') }}" required autofocus>
                @error('title')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-10">
                <label for="description" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">Description détaillée</label>
                <textarea id="description" name="description" rows="6" 
                    class="premium-input resize-none @error('description') border-red-500/50 @enderror" 
                    placeholder="Quelles sont les étapes clés de cette tâche ?"
                    required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between gap-6 pt-4 border-t border-white/5">
                <a href="{{ route('tasks.index') }}" class="text-slate-400 hover:text-white font-semibold transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour
                </a>
                <button type="submit" class="premium-button px-10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                    </svg>
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
