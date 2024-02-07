<div >
    <div class="inline-block relative">

        <label>
            <input class="bg-gray-300 text-gray-700 border-2 w-56 mt-1
        focus-visible:outline-none placeholder:text-gray-400 rounded-full"
                   placeholder="rechercher une annonce " wire:model.live="query">
        </label>
        <svg
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute top-0 right-0 m-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </div>

       <div class="absolute border bg-gray-200 text-md w-56 mt-1">
           @if(strlen($query)>2)
               <div>
                   @if(count($annonces)>0)
                       @foreach($annonces as $annonce)
                           <a href="{{ url("annonce=". $annonce->id) }}">
                               <p class="p-1">{{$annonce->titre}}</p>
                           </a>

                       @endforeach
                    @else
               <span class="p-1 text-red-800"> 0 resultats pour "{{$query}}"</span>
                   @endif
               </div>
           @endif
       </div>



</div>
