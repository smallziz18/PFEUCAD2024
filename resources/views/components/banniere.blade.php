<nav class="flex items-center justify-between flex-col md:flex-row px-8 mt-5">
    <div class="mb-4 md:mb-0">
        <a class="flex items-center justify-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl" href="/">
            <p class="mr-2">Dakar Deals</p>
            <svg class="fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
            </svg>
        </a>
    </div>
    <div class="pl-2 flex">

        <a class="flex">
            <x-modal-search>
            </x-modal-search>
        </a>

    </div>
    <div class="navlinks md:flex">
        <ul class="flex md:flex-row flex-col items-center gap-4">
            @if (Route::has('login'))

                @auth

                    <li class="bg-[#a6c1ee] text-gray-500">
                        <x-danger-button class="rounded">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')"

                                   onclick="event.preventDefault();
                                                this.closest('form').submit();" >
                                    {{ __('Se deconnecter') }}
                                </a>
                            </form>
                        </x-danger-button>
                    </li>
                    <li class= "bg-[#a6c1ee] text-gray-500">
                        <x-primary-button class="rounded">
                            <a href="{{ route('addannonce') }}" >Ajouter Annonce</a>
                        </x-primary-button>

                    </li>

                    <li class="bg-[#a6c1ee] text-gray-500">
                        <x-primary-button class="rounded">
                            <a href="{{ route('profile.edit') }}" >Profile</a>
                        </x-primary-button>

                    </li>


                @else

                    <li>
                        <x-primary-button class="rounded">
                            <a href="{{ route('login') }}" >Se connecter</a>
                        </x-primary-button>
                    </li>

                    @if (Route::has('register'))
                        <li>
                            <x-primary-button class="rounded">
                                <a href="{{ route('register') }}" >S'inscrire</a>
                            </x-primary-button>
                        </li>


                    @endif
                @endauth

            @endif
        </ul>
    </div>

    <div class="md:hidden">

        <ion-icon class="text-3xl cursor-pointer" name="menu-outline" onclick="toggleMenu()"></ion-icon>
    </div>
</nav>
