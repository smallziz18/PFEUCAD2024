<div id="updateModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Contenu de la modal -->
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                            Mettre à jour l'annonce
                        </h3>
                        <div class="mt-2">
                            <form method="POST" action="{{ route('annonces.update', ['annonce' => $annonce->id]) }}" class="w-full max-w-lg mx-auto bg-white p-8 rounded shadow-md">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$annonce->id}}">

                                <div class="mb-4">
                                    <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre de l'annonce:</label>
                                    <input type="text" id="titre" name="titre" value="{{ $annonce->titre }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description de l'annonce:</label>
                                    <textarea id="description" name="description" class="form-textarea rounded-md shadow-sm mt-1 block w-full" rows="4">{{ $annonce->description }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix de l'annonce:</label>
                                    <input type="number" id="prix" name="prix" value="{{ $annonce->prix }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                </div>

                                <div class="mb-4">
                                    <label for="categorie" class="block text-gray-700 text-sm font-bold mb-2">Catégorie de l'annonce:</label>
                                    <input type="text" id="categorie" name="categorie" value="{{ $annonce->categorie }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                </div>

                                <div class="mb-4">
                                    <label for="livrable" class="block text-gray-700 text-sm font-bold mb-2">Livrable:</label>
                                    <input type="checkbox" id="livrable" name="livrable" {{ $annonce->livrable ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-indigo-600"><span class="ml-2 text-gray-700">Est-ce que l'article est livrable?</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier l'annonce</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //  ouvrir  modal
    function openModal() {
        document.getElementById('updateModal').classList.remove('hidden');
    }

    // fermer le modal
    function closeModal() {
        document.getElementById('updateModal').classList.add('hidden');
    }
</script>
