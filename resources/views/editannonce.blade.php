<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
        <x-input-label for="titre" :value="__('titre')" />
        <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full"  required />

    </div>
    <div>
        <x-input-label for="description" :value="__('description')" />
        <x-text-input id="description" name="description" type="texterea" class="mt-1 block w-full"  required />

    </div>
    <div>
        <x-input-label for="prix" :value="__('prix')" />
        <x-text-input id="prix" name="prix" type="number" class="mt-1 block w-full"  required />

    </div>

    <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
</form>
