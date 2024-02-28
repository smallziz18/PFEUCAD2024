<div x-data="{ showModal: false }">
    <!-- Bouton pour ouvrir la modal -->
    <div class="pl-2 flex">
        <button @click="showModal = true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            <!-- Icône SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12a6 6 0 11-12 0 6 6 0 0112 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Recherche avancée
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
                <h2 class="text-xl font-bold mb-4">Recherche avancée</h2>
                @livewire('bare-de-recherche')
            </div>
        </div>
    </div>
</div>
