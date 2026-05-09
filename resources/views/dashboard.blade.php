@extends('layouts.app')

@section('header')
    <h2 class="text-3xl font-bold text-white tracking-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="premium-card text-center py-20 relative overflow-visible">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-primary/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-secondary/20 rounded-full blur-3xl animate-pulse"></div>

        <div class="w-32 h-32 bg-gradient-to-tr from-primary to-secondary rounded-[2.5rem] flex items-center justify-center mx-auto mb-10 shadow-2xl animate-float">
            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"></path>
            </svg>
        </div>
        
        <h3 class="text-5xl font-black text-white mb-6 tracking-tighter">
            Prêt pour aujourd'hui, <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">{{ Auth::user()->name }}</span> ?
        </h3>
        
        <p class="text-text-dim max-w-xl mx-auto mb-12 text-xl font-medium leading-relaxed">
            Votre arsenal de productivité est prêt. Gérez vos projets avec une fluidité inégalée et atteignez de nouveaux sommets.
        </p>
        
        <div class="flex flex-wrap justify-center gap-6">
            <a href="{{ route('tasks.index') }}" class="premium-button">
                Exploiter mes tâches
            </a>
            <a href="{{ route('tasks.create') }}" class="px-10 py-4 rounded-2xl bg-white/5 hover:bg-white/10 text-white font-black uppercase tracking-widest text-xs transition-all backdrop-blur-xl border border-white/10 shadow-xl flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Nouvelle Mission
            </a>
        </div>
    </div>
@endsection
