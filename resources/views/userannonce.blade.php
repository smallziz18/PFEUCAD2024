<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vos Annonces Publiées') }}
        </h2>
    </x-slot>
    
    @if(count($userannonces) > 0)
        <table class="table-auto mx-auto">
            <thead>
            <tr>
                <th class="px-4 py-2">Titre</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Prix</th>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($userannonces as $annonce)
                <tr>
                    <td class="border px-4 py-2">{{ $annonce->titre }}</td>
                    <td class="border px-4 py-2">{{ Str::limit($annonce->description, 50) }}</td>
                    <td class="border px-4 py-2">{{ $annonce->prix }} FCFA</td>
                    <td class="border px-4 py-2">
                        @if ($annonce->images->isNotEmpty())
                            <img class="w-32 h-32 object-cover" src="{{ $annonce->images->first()->url_image }}" alt="Image de l'annonce">
                        @else
                            <img src="Pas_d'image_disponible.svg.png" class="w-32 h-32 object-cover">
                        @endif
                    </td>
                    <td class="border px-4 py-2">

                        <a href="{{ route('annonces.update', ['id' => $annonce->id]) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Mettre à jour</a>
                        <form method="post" action="{{ route('annonces.delete', ['id' => $annonce->id]) }}" class="inline">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Etes vous sur de vouloir supprimer cette annonce?')" type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600 dark:text-gray-300">Pas d'annonce.</p>
    @endif
</x-app-layout>
