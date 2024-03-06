<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vos Annonces Publiées') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 px-4">
        @if(count($userannonces) > 0)
            <div class="overflow-x-auto">
                <table class="table-auto bg-white dark:bg-gray-800 shadow-md rounded-lg w-full"> <!-- Utilisez w-full pour occuper toute la largeur -->
                    <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="px-4 py-2 text-left">Titre</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Prix</th>
                        <th class="px-4 py-2 text-left">Image</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userannonces as $annonce)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-4 py-2">{{ $annonce->titre }}</td>
                            <td class="px-4 py-2">{{ Str::limit($annonce->description, 50) }}</td>
                            <td class="px-4 py-2">{{ $annonce->prix }} FCFA</td>
                            <td class="px-4 py-2">
                                @if ($annonce->images->isNotEmpty())
                                    <img class="w-32 h-32 object-cover" src="{{ $annonce->images->first()->url_image }}" alt="Image de l'annonce">
                                @else
                                    <img src="Pas_d'image_disponible.svg.png" class="w-32 h-32 object-cover">
                                @endif
                            </td>
                            <td class="px-4 py-2 flex items-center space-x-4"> <!-- Utilisez space-x-4 pour ajouter de l'espace entre les éléments -->
                                <a href="{{ url("userannonce". $annonce->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Modifier</a>
                                <form action="{{ route('annonces.renew', $annonce->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button onclick="return confirm('Cette Annonce sera renouvelée pour 90 jours')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">Renouveler l'annonce</button>
                                </form>
                                <form method="post" action="{{ route('annonces.delete', ['id' => $annonce->id]) }}" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Etes-vous sûr de vouloir supprimer cette annonce?')" type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="text-gray-600 dark:text-gray-300">Pas d'annonce.</div>
        @endif
    </div>
</x-app-layout>
