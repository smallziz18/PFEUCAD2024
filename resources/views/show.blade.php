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

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked + #menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>




</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

<!--Nav-->
<nav id="header" class="w-full z-30 top-0 py-1 fixed bg-white" >
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">

                    @livewire('bare-de-recherche')
                </ul>
            </nav>
        </div>

        <div class="order-1 md:order-2">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="/">
                Dakar Deals
                <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                </svg>



            </a>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content">

            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <x-danger-button>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')"
                                   onclick="event.preventDefault();
                                                this.closest('form').submit();" >
                                    {{ __('Se deconnecter') }}
                                </a>
                            </form>
                        </x-danger-button>
                        <x-primary-button>
                            <a href="{{ route('addannonce') }}" >Ajouter Annonce</a>
                        </x-primary-button>
                        <x-primary-button>
                            <a href="{{ url('/profile') }}" >Mon profil</a>
                        </x-primary-button>
                    @else
                        <x-primary-button>
                            <a href="{{ route('login') }}" >Se connecter</a>
                        </x-primary-button>
                        @if (Route::has('register'))
                            <x-primary-button>
                                <a href="{{ route('register') }}" >S'inscrire</a>
                            </x-primary-button>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </div>
</nav>
<section class="bg-white py-8">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

        <!-- Bloc des images de l'annonce -->
        <div class="w-full py-4">
            <div class="flex flex-wrap justify-center">
                @if($images)
                    @foreach($images as $image)
                        <div class="w-full md:w-1/3 xl:w-1/4 p-2">
                            <img class="hover:grow hover:shadow-lg" style="height: 300px ; width: 1000px" src="{{ $image->image_url }}" alt="Image de l'annonce">
                        </div>
                    @endforeach
                @else
                    <div class="w-full md:w-1/3 xl:w-1/4 p-2">
                        <img class="hover:grow hover:shadow-lg" style="height: 300px ; width: 1000px" src="Pas_d'image_disponible.svg.png" alt="Image de l'annonce">
                    </div>
                @endif
            </div>
        </div>

        <!-- Bloc des détails de l'annonce -->
        <div class="w-full md:w-1/2 md:ml-8 p-4 ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __($annonce->titre) }}
            </h2>
            <p class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">Date : {{ $annonce->created_at->format('d/m/Y') }}</p>
            <p class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">Publié Par : {{ $user->name }}</p>
            <a href="https://wa.me/{{ $user->telephone }}?text=Bonjour%20{{ $user->name }}%20,%20je%20suis%20intéressé%20par%20votre%20annonce%20{{ $annonce->titre }}%20Pourriez-vous%20m'en%20dire%20plus%20?" target="_blank" rel="noopener noreferrer" class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">Numéro : {{ $user->telephone }}</a>
            <p class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">Nombre de like : {{ $annonce->like }}</p>
            <p class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">Nombre de vue : {{ $annonce->vue }}</p>
        </div>

        <!-- Bloc des commentaires -->
        <div class="w-full md:w-1/2 md:ml-8 p-4">
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

            <!-- Formulaire pour ajouter un commentaire -->
            <form method="POST" action="{{ url('/ajouter_commentaire') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="commentaire" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ajouter un commentaire</label>
                    <textarea id="commentaire" name="commentaire" rows="3" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Commenter</button>
            </form>
            @if(Session::has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Succès!</strong>
                    <span class="block sm:inline">{{ Session::get('success') }}</span>
                </div>
            @endif
        </div>
    </div>
</section>


