<section>
    <header>
        <h2 class="text-2xl font-black text-white tracking-tight uppercase">
            {{ __('Mettre à jour le mot de passe') }}
        </h2>

        <p class="mt-2 text-text-dim font-medium">
            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-10 space-y-8">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">{{ __('Mot de passe actuel') }}</label>
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">{{ __('Nouveau mot de passe') }}</label>
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest">{{ __('Confirmer le mot de passe') }}</label>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-6 pt-4">
            <x-primary-button class="px-10">{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-400 font-bold"
                >{{ __('Enregistré.') }}</p>
            @endif
        </div>
    </form>
</section>
