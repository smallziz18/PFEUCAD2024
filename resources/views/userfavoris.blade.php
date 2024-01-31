<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vos Favoris') }}
        </h2>
    </x-slot>

    @foreach($favoris as $favoris)
        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
            <a href="{{ url('/annonce/' . $favoris->annonce->id) }}">
                @if ($favoris->annonce->images->isNotEmpty())
                    <!-- Afficher la première image de l'annonce s'il y en a -->
                    <img class="hover:grow hover:shadow-lg" src="{{ $favoris->annonce->images->first()->url_image }}" alt="Image de l'annonce">
                @else
                    <!-- Afficher un message si aucune image n'est associée à l'annonce -->
                    <img src="Pas_d'image_disponible.svg.png">
                @endif

                <div class="pt-3 flex items-center justify-between">
                    <p class="">{{ $favoris->annonce->titre }}</p>

                </div>

                <p>{{ $favoris->annonce->created_at->format('d/m/Y') }}</p>
            </a>
        </div>
    @endforeach
</x-app-layout>
