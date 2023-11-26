<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vos Annonces Publiées') }}
        </h2>
    </x-slot>
    @if(count($userannonces) > 0)

        <ul>
            @foreach($userannonces as $annonce)
                <li class="mb- dd4">

                    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
                        <div id="annonce-{{ $annonce->id }}">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $annonce->titre }}</h2>
                            <p class="text-gray-600 dark:text-gray-300">Prix :{{ $annonce->prix }} FCFA</p>



                            <form method="post" action="{{ route('annonces.update', ['id' => $annonce->id]) }}" class="p-6">
                                @csrf
                                @method('put')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Éditer cette annonce') }}
                                </h2>

                                <!-- Ajoutez ici les champs de votre formulaire d'édition d'annonce -->
                                <x-input-label for="titre" value="{{ __('Titre') }}" />
                                <x-text-input
                                    id="titre"
                                    name="titre"
                                    type="text"
                                    class="mt-1 block w-3/4"
                                    :value="$annonce->titre"
                                />

                                <x-input-label for="description" value="{{ __('Description') }}" />
                                <textarea id="description" name="description" class="mt-1 block w-3/4">{{ $annonce->description }}</textarea>

                                <div class="mt-6">
                                    <x-input-label for="categorie" value="{{ __('Catégorie') }}" />

                                    <select id="categorie" name="categorie" class="mt-1 block w-3/4">
                                        <option value="option1" {{ $annonce->categorie === 'option1' ? 'selected' : '' }}>Option 1</option>
                                        <option value="option2" {{ $annonce->categorie === 'option2' ? 'selected' : '' }}>Option 2</option>
                                        <option value="option3" {{ $annonce->categorie === 'option3' ? 'selected' : '' }}>Option 3</option>
                                        <option value="option3" {{ $annonce->categorie === 'option3' ? 'selected' : '' }}>Option 4</option>

                                    </select>
                                </div>

                                <x-input-label for="prix" value="{{ __('Prix') }}" />
                                <x-text-input
                                    id="prix"
                                    name="prix"
                                    type="decimal"
                                    class="mt-1 block w-3/4"
                                    :value="$annonce->prix"
                                />

                                <x-primary-button class="ms-3">
                                    {{ __('Sauvegarder') }}
                                </x-primary-button>

                            </form>
                            <form method="post" action="{{ route('annonces.delete', ['id' => $annonce->id]) }}" class="p-6">
                                @csrf
                                @method('delete')



                                <x-danger-button class="ms-3">
                                    {{ __('Supprimer Annonce') }}
                                </x-danger-button>

                            </form>








                        </div>

                    </div>
                </li>


            @endforeach
        </ul>
    @else
        <p class="text-gray-600 dark:text-gray-300">Pas d'annonce.</p>
    @endif


</x-app-layout>

