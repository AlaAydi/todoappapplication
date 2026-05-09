@extends('layouts.app')

@section('header')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="relative pl-8">
        <div class="absolute left-0 top-0 w-1.5 h-full bg-gradient-to-b from-primary to-secondary rounded-full shadow-[0_0_15px_rgba(139,92,246,0.5)]"></div>
        <h2 class="text-5xl font-black text-white tracking-tighter leading-none">
            Mon <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Profil</span>
        </h2>
        <p class="text-text-dim mt-4 text-xl font-medium tracking-wide">Gérez vos informations personnelles et votre sécurité.</p>
    </div>
</div>
@endsection

@section('content')
<div class="space-y-12 pb-20">
    <div class="premium-card relative overflow-visible">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="premium-card relative overflow-visible">
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-secondary/10 rounded-full blur-3xl"></div>
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="premium-card border-red-500/20">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
