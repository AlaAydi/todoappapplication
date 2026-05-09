<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-black text-red-400 tracking-tight uppercase">
            {{ __('Supprimer le compte') }}
        </h2>

        <p class="mt-2 text-text-dim font-medium">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger les données ou informations que vous souhaitez conserver.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-10"
    >{{ __('Supprimer le compte') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-10 bg-bg-dark border border-white/10 rounded-3xl">
            @csrf
            @method('delete')

            <h2 class="text-3xl font-black text-white tracking-tighter">
                {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
            </h2>

            <p class="mt-4 text-text-dim text-lg leading-relaxed">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
            </p>

            <div class="mt-8">
                <label for="password_deletion" class="block text-sm font-bold text-slate-300 mb-2 uppercase tracking-widest sr-only">{{ __('Mot de passe') }}</label>

                <x-text-input
                    id="password_deletion"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Mot de passe') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-10 flex justify-end gap-6">
                <button type="button" x-on:click="$dispatch('close')" class="text-slate-400 hover:text-white font-bold transition-colors">
                    {{ __('Annuler') }}
                </button>

                <x-danger-button class="px-10">
                    {{ __('Supprimer définitivement') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
