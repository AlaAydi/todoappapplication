@extends('layouts.app')

@section('header')
<div class="max-w-2xl mx-auto">
    <h2 class="text-4xl font-extrabold text-white tracking-tight">
        Modifier la <span class="text-indigo-400">Tâche</span>
    </h2>
    <p class="text-slate-400 mt-2 text-lg">Ajustez vos priorités pour réussir.</p>
</div>
@endsection

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="premium-card relative overflow-visible">
        <div class="absolute -top-6 -right-6 w-24 h-24 bg-indigo-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-amber-500/20 rounded-full blur-3xl"></div>
        
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="relative z-10">
            @csrf
            @method('PUT')

            <div class="mb-8">
                <label for="title" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">Titre de la tâche</label>
                <input type="text" id="title" name="title" 
                    class="premium-input @error('title') border-red-500/50 @enderror" 
                    value="{{ old('title', $task->title) }}" required autofocus>
                @error('title')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <label for="description" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">Notes & Détails</label>
                <textarea id="description" name="description" rows="6" 
                    class="premium-input resize-none @error('description') border-red-500/50 @enderror" 
                    required>{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-10">
                <label for="completed" class="inline-flex items-center group cursor-pointer">
                    <div class="relative">
                        <input id="completed" type="checkbox" name="completed" class="sr-only peer" {{ $task->completed ? 'checked' : '' }}>
                        <div class="w-14 h-7 bg-white/5 border border-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[3px] after:start-[3px] after:bg-slate-400 after:rounded-full after:h-5 after:w-7 after:transition-all peer-checked:bg-indigo-500/20 peer-checked:border-indigo-500/50 peer-checked:after:bg-indigo-400"></div>
                    </div>
                    <span class="ms-4 text-base font-semibold text-slate-400 group-hover:text-white transition-colors">Marquer comme complétée</span>
                </label>
            </div>

            <div class="flex items-center justify-between gap-6 pt-6 border-t border-white/5">
                <a href="{{ route('tasks.index') }}" class="text-slate-400 hover:text-white font-semibold transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Annuler
                </a>
                <button type="submit" class="premium-button px-10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
