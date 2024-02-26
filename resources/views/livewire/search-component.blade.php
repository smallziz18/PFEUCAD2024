<div>
    <input type="text" wire:model.lazy="searchTerm" class="form-control rounded border border-l-blue-500"  placeholder="Search...">

    <ul>
        @foreach($results as $result)
           @if($result && $result->count()>0)
                <li>
                    <a href="{{ route('annonce.show', $result->first()->id) }}">
                        <h3>{{ $result->first()->title }}</h3>
                        <p>{{ $result->first()->description }}</p>
                    </a>
                </li>
            @else
                <li>Aucun résultat trouvé</li>
           @endif
        @endforeach
    </ul>
</div>
