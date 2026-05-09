@extends('layouts.app')

@section('header')
<div>
    <h2 class="text-3xl font-bold text-white tracking-tight">
        Nouvelle <span class="text-indigo-400">Tâche</span>
    </h2>
    <p class="text-slate-400 mt-1">Ajoutez un nouvel objectif à votre liste.</p>
</div>
@endsection

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="premium-card">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <x-input-label for="title" :value="__('Titre')" />
                <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" :value="old('title')" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mb-8">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" class="premium-input block mt-1 w-full" rows="5" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('tasks.index') }}" class="text-sm text-slate-400 hover:text-white transition-colors">
                    Annuler
                </a>
                <x-primary-button class="w-auto">
                    {{ __('Enregistrer la tâche') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
