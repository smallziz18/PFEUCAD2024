

<div>
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <input type="search" wire:model.live="searchTerm" class="form-control rounded border p-2 mr-2" placeholder="Rechercher ...">
            @include('components.modal-search')
        </div>
    </div>
    <div class="max-h-19 overflow-auto z-0">
        @forelse($annonces as $annonce)
            <a href="{{ url('/annonce=' . $annonce->id) }}" class="block border rounded p-2 mb-2 hover:bg-gray-100">
                <p>{{ $annonce->titre }} - {{ $annonce->prix }} FCFA</p>
                <img class="w-9 flex" src="{{ $annonce->images->first()->url_image }}">
            </a>
        @empty
            @if(strlen($searchTerm) >= 3)
                <p class="text-gray-500">Aucun résultat trouvé</p>
            @endif
        @endforelse
    </div>
</div>


