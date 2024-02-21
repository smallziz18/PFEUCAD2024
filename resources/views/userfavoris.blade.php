<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vos Favoris') }}
        </h2>
    </x-slot>
    <section class="bg-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4"> <!-- Ajout de la classe gap-4 pour créer un espace de 4 unités entre les éléments de la grille -->
                @foreach($favoris as $favori)
                    <div class="flex flex-col">
                        <a href="{{ url("annonce=". $favori->annonce->id) }}">
                            @if ($favori->annonce->images->isNotEmpty())
                                <div class="image-container" style="height: 300px;">
                                    <img class="hover:grow hover:shadow-lg" style="height: 100%; width: 100%;" src="{{ $favori->annonce->images->first()->url_image }}" alt="Image de l'annonce">
                                </div>
                            @else
                                <div class="image-container" style="height: 300px;">
                                    <img class="hover:grow hover:shadow-lg" style="height: 100%; width: 100%;" src="Pas_d'image_disponible.svg.png" alt="Pas d'image disponible">
                                </div>
                            @endif


                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">{{ $favori->annonce->titre }}</p>
                                </div>
                                <p class="pt-1 text-gray-900">{{ $favori->annonce->prix }} FCFA</p>
                                <p>Publié Par : {{ $favori->annonce->user->name }}</p>
                                <p>{{ $favori->annonce->created_at->format('d/m/Y') }}</p>
                                <form method="post" action="{{ route('favori.delete', ['id' => $favori->annonce->id]) }}" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Etes vous sur de vouloir supprimer cette annonce?')" type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer des Favoris</button>
                                </form>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
