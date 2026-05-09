@extends('layouts.app')

@section('header')
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
    <div class="relative pl-8">
        <div class="absolute left-0 top-0 w-1.5 h-full bg-gradient-to-b from-primary to-secondary rounded-full shadow-[0_0_15px_rgba(139,92,246,0.5)]"></div>
        <h2 class="text-6xl font-black text-white tracking-tighter leading-none">
            Mes <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Projets</span>
        </h2>
        <p class="text-text-dim mt-4 text-xl font-medium tracking-wide">Votre centre de commande personnel.</p>
    </div>
    <div class="flex items-center">
        <a href="{{ route('tasks.create') }}" class="premium-button !py-5 !px-10 text-base">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Nouvelle Mission
        </a>
    </div>
</div>

<!-- Stats Overview -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mt-12">
    <div class="premium-card !p-8 group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-text-dim text-sm font-bold uppercase tracking-widest mb-1">Total</p>
                <p class="text-4xl font-black text-white">{{ $tasks->count() }}</p>
            </div>
            <div class="w-16 h-16 bg-primary/10 rounded-3xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform duration-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="premium-card !p-8 group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-text-dim text-sm font-bold uppercase tracking-widest mb-1">Terminées</p>
                <p class="text-4xl font-black text-white">{{ $tasks->where('completed', true)->count() }}</p>
            </div>
            <div class="w-16 h-16 bg-success/10 rounded-3xl flex items-center justify-center text-success group-hover:scale-110 transition-transform duration-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="premium-card !p-8 group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-text-dim text-sm font-bold uppercase tracking-widest mb-1">Prioritaires</p>
                <p class="text-4xl font-black text-white">{{ $tasks->where('completed', false)->count() }}</p>
            </div>
            <div class="w-16 h-16 bg-warning/10 rounded-3xl flex items-center justify-center text-warning group-hover:scale-110 transition-transform duration-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
    @forelse($tasks as $task)
        <div class="premium-card flex flex-col justify-between group h-full">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-8">
                    <span class="px-5 py-2 rounded-2xl text-[10px] font-black tracking-[0.2em] uppercase border {{ $task->completed ? 'badge-green' : 'badge-indigo' }}">
                        {{ $task->completed ? 'Succès' : 'Actif' }}
                    </span>
                    <div class="flex gap-2">
                        @can('update', $task)
                            <a href="{{ route('tasks.edit', $task) }}" class="p-3 rounded-2xl bg-white/5 hover:bg-primary/20 text-text-dim hover:text-primary transition-all duration-300 group/btn shadow-lg" title="Modifier">
                                <svg class="w-5 h-5 group-hover/btn:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                        @endcan
                        @can('delete', $task)
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-3 rounded-2xl bg-white/5 hover:bg-error/20 text-text-dim hover:text-error transition-all duration-300 group/btn shadow-lg" onclick="return confirm('Voulez-vous vraiment supprimer cette tâche ?')" title="Supprimer">
                                    <svg class="w-5 h-5 group-hover/btn:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
                <h3 class="text-3xl font-black text-white mb-4 leading-tight {{ $task->completed ? 'line-through opacity-40' : 'group-hover:text-primary' }} transition-all duration-300">
                    {{ $task->title }}
                </h3>
                <p class="text-text-dim text-lg leading-relaxed mb-10 line-clamp-3 {{ $task->completed ? 'opacity-30' : '' }}">
                    {{ $task->description }}
                </p>
            </div>
            
            <div class="pt-8 border-t border-white/5 flex items-center justify-between text-sm">
                <span class="flex items-center gap-3 font-bold text-text-dim uppercase tracking-widest text-[10px]">
                    <div class="w-2 h-2 rounded-full bg-secondary shadow-[0_0_10px_rgba(236,72,153,0.8)]"></div>
                    {{ $task->created_at->translatedFormat('d M Y') }}
                </span>
                <div class="flex items-center gap-3">
                    <span class="text-[10px] font-black text-text-dim uppercase tracking-widest">{{ auth()->user()->name }}</span>
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-primary to-secondary p-[2px] shadow-lg">
                        <div class="w-full h-full bg-bg-dark rounded-[14px] flex items-center justify-center text-xs font-black text-white">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full premium-card text-center py-24 flex flex-col items-center">
            <div class="w-24 h-24 bg-indigo-500/10 rounded-[32px] flex items-center justify-center mb-8 floating">
                <svg class="w-12 h-12 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-white mb-3">Votre liste est vide</h3>
            <p class="text-slate-400 mb-10 text-lg max-w-md">Commencez à planifier votre journée en ajoutant votre première tâche dès maintenant.</p>
            <a href="{{ route('tasks.create') }}" class="premium-button">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Créer une tâche
            </a>
        </div>
    @endforelse
</div>
@endsection
