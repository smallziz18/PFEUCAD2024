<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter Annonce') }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('annonces.update')}}" class="p-6">
        @csrf


        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('ajouter annonce') }}
        </h2>


        <x-input-label for="titre" value="{{ __('Titre') }}" />
        <x-text-input
            id="titre"
            name="titre"
            type="text"
            class="mt-1 block w-3/4"
            required

        />

        <x-input-label for="description" value="{{ __('Description') }}" />
        <textarea id="description" name="description" class="mt-1 block w-3/4"></textarea>

        <div class="mt-6">
            <x-input-label for="categorie" value="{{ __('Catégorie') }}" />

            <select id="categorie" name="categorie" class="mt-1 block w-3/4" >
                <option value="option1" >Option 1</option>
                <option value="option2" }>Option 2</option>
                <option value="option3" >Option 3</option>
                <option value="option4" >Option 4</option>

            </select>
        </div>

        <x-input-label for="prix" value="{{ __('Prix') }}" />
        <x-text-input
            id="prix"
            name="prix"
            type="decimal"
            class="mt-1 block w-3/4"
            required
        />


        <x-primary-button class="ms-3">
            {{ __('Sauvegarder') }}
        </x-primary-button>

    </form>
</x-app-layout>
