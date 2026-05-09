@extends('layouts.app')

@section('header')
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h2 class="text-3xl font-bold text-white tracking-tight">
            Mes <span class="text-indigo-400">Tâches</span>
        </h2>
        <p class="text-slate-400 mt-1">Gérez vos activités quotidiennes avec style.</p>
    </div>
    <a href="{{ route('tasks.create') }}" class="premium-button">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Nouvelle tâche
    </a>
</div>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($tasks as $task)
        <div class="premium-card flex flex-col justify-between group">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase {{ $task->completed ? 'bg-emerald-500/10 text-emerald-400' : 'bg-indigo-500/10 text-indigo-400' }}">
                        {{ $task->completed ? 'Terminée' : 'En cours' }}
                    </span>
                    <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        @can('update', $task)
                            <a href="{{ route('tasks.edit', $task) }}" class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-slate-300 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                        @endcan
                        @can('delete', $task)
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 transition-colors" onclick="return confirm('Supprimer cette tâche ?')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 {{ $task->completed ? 'line-through opacity-50' : '' }}">
                    {{ $task->title }}
                </h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6 {{ $task->completed ? 'opacity-50' : '' }}">
                    {{ Str::limit($task->description, 120) }}
                </p>
            </div>
            
            <div class="pt-4 border-t border-white/5 flex items-center justify-between text-xs text-slate-500 font-medium">
                <span class="flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path>
                    </svg>
                    {{ $task->created_at->format('d M Y') }}
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    {{ auth()->user()->name }}
                </span>
            </div>
        </div>
    @empty
        <div class="col-span-full premium-card text-center py-20">
            <div class="w-20 h-20 bg-white/5 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-2">Aucune tâche trouvée</h3>
            <p class="text-slate-400 mb-8">Commencez par créer votre première tâche pour rester organisé.</p>
            <a href="{{ route('tasks.create') }}" class="premium-button">
                Créer une tâche
            </a>
        </div>
    @endforelse
</div>
@endsection
