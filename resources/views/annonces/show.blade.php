

    <div>
        <h1>Annonce {{ $annonce->id }}</h1>
        <p>{{ $annonce->titre }}</p>
        @if(isset($images))
            @foreach($images as $image)
                <img src="{{ $image->image_url }}" alt="Image">
            @endforeach
        @endif


    </div>

