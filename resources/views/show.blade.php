<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($annonce->titre) }}
        </h2>
    </x-slot>
    <section class="bg-white py-8">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            @if ($images->isNotEmpty())
                @foreach($images as $image)
                    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">

                        <img class="hover:grow hover:shadow-lg mb-4" src="{{ $image->image_url }}" alt="Image de l'annonce">

                    </div>
                @endforeach
                    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Date :{{ $annonce->created_at->format('d/m/Y') }}</h3>
                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Publié Par :{{$user->name}}</h3>
                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Numero :{{$user->telephone}}</h3>
                        </div>
                    </div>

            @else
                <!-- Afficher un message si aucune image n'est associée à l'annonce -->
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <img src="Pas_d_image_disponible.svg.png" alt="Pas d'image disponible">


                    <p>{{ $annonce->created_at->format('d/m/Y') }}</p>
                </div>
            @endif

        </div>
    </section>
</x-app-layout>
