<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dakar Deals</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

</style>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

<x-banniere>

</x-banniere>

<!-- Section des détails de l'annonce -->
<section class="bg-white py-8">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <!-- Bloc des images de l'annonce -->
        <div class="w-full py-4">
            <div class="flex flex-wrap justify-center">
                @if($images)
                    @foreach($images as $image)
                        <div class="w-full md:w-1/3 xl:w-1/4 p-2">
                            <img class="hover:grow hover:shadow-lg" style="height: 300px; width: 100%;" src="{{ $image->image_url }}" alt="Image de l'annonce">
                        </div>
                    @endforeach
                @else
                    <div class="w-full md:w-1/3 xl:w-1/4 p-2">
                        <img class="hover:grow hover:shadow-lg" style="height: 300px; width: 100%;" src="Pas_d'image_disponible.svg.png" alt="Image de l'annonce">
                    </div>
                @endif
            </div>
        </div>

        <!-- Bloc des détails de l'annonce -->
        <div class="w-full md:w-1/2 md:ml-8 p-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __($annonce->titre) }}
            </h2>
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">Détails de l'annonce</h3>
            <p>Date : {{ $annonce->created_at->format('d/m/Y') }}</p>
            <p>Publié Par : {{ $user->name }}</p>
            <p>Nombre de like : {{ $annonce->like }}</p>
            <p>Nombre de vue : {{ $annonce->vue }}</p><br>
            <a href="https://wa.me/{{ $user->telephone }}?text=Bonjour%20{{ $user->name }}%20,%20je%20suis%20intéressé%20par%20votre%20annonce%20{{ $annonce->titre }}%20Pourriez-vous%20m'en%20dire%20plus%20?" target="_blank" rel="noopener noreferrer" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                </svg>
                <span style="display:inline-block; width:20px;"></span> Contacter via WhatsApp</p>
            </a>


        @auth
            @if (!$annonce->isFavoritedByUser(Auth::id()))
            <a href="{{ route('favori.ajouter',['id'=>$annonce]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Ajouter au favoris</a>
            @else
                <form method="post" action="{{ route('favori.delete', ['id' => $annonce->id]) }}" class="inline">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Etes vous sur de vouloir supprimer cette annonce?')" type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer des Favoris</button>
                </form>
            @endif
            @if(session('message'))
                <div class="alert alert-{{ session('status') }}">
                    {{ session('message') }}
                </div>
            @endif
            @endauth

        </div>


        <!-- Bloc des commentaires -->
        <div class="w-full md:w-1/2 md:ml-8 p-4">
            @if($commentaire && count($commentaire) > 0)
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">Commentaires</h3>
            <div class="max-h-72 overflow-auto bg-gray-100 p-4 rounded-lg mb-4">
                @if($commentaire)
                    @foreach ($commentaire as $comment)
                        <div class="mt-2">
                            <p class="text-sm font-medium text-gray-900">{{ $comment->user->name }} : {{ $comment->commentaire }}</p>
                        </div>
                    @endforeach
                @else
                    <p>Aucun commentaire trouvé.</p>
                @endif
            </div>
            @endif

            <!-- Formulaire pour ajouter un commentaire -->
            <form method="POST" action="{{ url('/ajouter_commentaire') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="commentaire" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ajouter un commentaire</label>
                    <textarea id="commentaire" name="commentaire" required rows="3" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Commenter</button>
            </form>

            <form method="POST" action="{{ url('/signaler') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Signaler annonce</button>
            </form>
            @if(Session::has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Succès!</strong>
                    <span class="block sm:inline">{{ Session::get('success') }}</span>
                </div>
            @endif
            @if(Session::has('signal'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ Session::get('signal') }}</span>
                </div>
            @endif
        </div>
    </div>
</section>
<x-footer>

</x-footer>

</body>

</html>
