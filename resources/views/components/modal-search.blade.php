<div x-data="{ showModal: false }">
    <!-- Bouton pour ouvrir la modal -->
    <div class="pl-2 flex">
        <button @click="showModal = true" class="flex items-center">
            <p>Rechercher</p>
            <ion-icon name="search-outline" class="text-3xl"></ion-icon>
        </button>
    </div>

    <!-- Template de la modal -->
    <div x-show="showModal" @click.away="showModal = false" class="fixed z-50 inset-0 flex items-center justify-center overflow-auto bg-gray-500 bg-opacity-75">
        <div class="bg-white rounded-lg p-8 m-4 max-w-md w-full">
            <div class="flex justify-end">
                <button @click="showModal = false">&times;</button>
            </div>
            <div>
                <!-- Contenu de la modal -->
                <h2 class="text-xl font-bold mb-4">Recherche</h2>


                @livewire('bare-de-recherche')
            </div>
        </div>
    </div>
</div>
