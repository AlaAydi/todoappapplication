@extends('layouts.app')

@section('header')
<div>
    <h2 class="text-3xl font-bold text-white tracking-tight">
        Modifier <span class="text-indigo-400">Tâche</span>
    </h2>
    <p class="text-slate-400 mt-1">Mettez à jour les détails de votre tâche.</p>
</div>
@endsection

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="premium-card">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <x-input-label for="title" :value="__('Titre')" />
                <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" :value="old('title', $task->title)" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mb-6">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" class="premium-input block mt-1 w-full" rows="5" required>{{ old('description', $task->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mb-8">
                <label for="completed" class="inline-flex items-center group cursor-pointer">
                    <div class="relative">
                        <input id="completed" type="checkbox" name="completed" class="sr-only peer" {{ $task->completed ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                    </div>
                    <span class="ms-3 text-sm font-medium text-slate-300 group-hover:text-white transition-colors">Marquer comme terminée</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('tasks.index') }}" class="text-sm text-slate-400 hover:text-white transition-colors">
                    Annuler
                </a>
                <x-primary-button class="w-auto">
                    {{ __('Mettre à jour') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
