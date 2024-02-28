<x-app-layout>


                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 w-full">
                    <div class="sm:flex sm:items-start w-full">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
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
                                        <select id="categorie" name="categorie" class="mt-1 p-2 border rounded-md w-full" value="{{$annonce->categorie}}">
                                            <optgroup label="Immobilier">
                                                <option value="appartement">Appartements</option>
                                                <option value="maison">Maisons</option>
                                                <option value="terrain">Terrains</option>
                                                <option value="colocation">Colocations</option>
                                                <option value="bureau">Bureaux & Commerces</option>
                                                <option value="location_vacances">Locations de vacances</option>
                                            </optgroup>
                                            <optgroup label="Véhicules">
                                                <option value="voiture">Voitures</option>
                                                <option value="moto">Motos</option>
                                                <option value="scooter">Scooters</option>
                                                <option value="vélo">Vélos</option>
                                                <option value="bateau">Bateaux</option>
                                                <option value="camion">Camions & Utilitaires</option>
                                                <option value="caravane">Caravanes & Camping-cars</option>
                                                <option value="autres_vehicules">Autres véhicules</option>
                                            </optgroup>
                                            <optgroup label="Électronique">
                                                <option value="ordinateur">Ordinateurs</option>
                                                <option value="smartphone">Smartphones</option>
                                                <option value="tablettes">Tablettes</option>
                                                <option value="tv">Télévisions</option>
                                                <option value="audio">Audio & Hi-Fi</option>
                                                <option value="photo_video">Photo & Vidéo</option>
                                                <option value="accessoires_electroniques">Accessoires électroniques</option>
                                            </optgroup>
                                            <optgroup label="Maison et Jardin">
                                                <option value="meubles">Meubles</option>
                                                <option value="électroménager">Électroménager</option>
                                                <option value="bricolage">Bricolage & Jardinage</option>
                                                <option value="décoration">Décoration</option>
                                                <option value="arts_ménagers">Arts ménagers</option>
                                                <option value="jardin">Jardin & Extérieur</option>
                                                <option value="autres_maison_jardin">Autres Maison & Jardin</option>
                                            </optgroup>
                                            <optgroup label="Mode et Accessoires">
                                                <option value="vêtements">Vêtements</option>
                                                <option value="chaussures">Chaussures</option>
                                                <option value="sacs">Sacs & Bagagerie</option>
                                                <option value="bijoux">Bijoux & Montres</option>
                                                <option value="vêtements_enfants">Vêtements Enfants & Bébés</option>
                                                <option value="accessoires_mode">Accessoires de mode</option>
                                            </optgroup>
                                            <optgroup label="Loisirs">
                                                <option value="livres">Livres & Magazines</option>
                                                <option value="musique">Musique & Instruments</option>
                                                <option value="films">Films & DVD</option>
                                                <option value="jeux_video">Jeux vidéo & Consoles</option>
                                                <option value="sports_loisirs">Sports & Loisirs</option>
                                                <option value="billets">Billets & Événements</option>
                                                <option value="collections">Collections & Antiquités</option>
                                            </optgroup>
                                            <optgroup label="Services">
                                                <option value="cours">Cours & Formations</option>
                                                <option value="services">Services à la personne</option>
                                                <option value="evenements">Événements & Fêtes</option>
                                                <option value="entreprises">Matériel professionnel</option>
                                                <option value="autres_services">Autres Services</option>
                                            </optgroup>
                                            <optgroup label="Animaux">
                                                <option value="chiens">Chiens</option>
                                                <option value="chats">Chats</option>
                                                <option value="oiseaux">Oiseaux</option>
                                                <option value="rongeurs">Rongeurs</option>
                                                <option value="animaux_ferme">Animaux de la ferme</option>
                                                <option value="autres_animaux">Autres Animaux</option>
                                            </optgroup>
                                            <optgroup label="Divers">
                                                <option value="autres">Autres</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="livrable" class="block text-gray-700 text-sm font-bold mb-2">Livrable:</label>
                                        <input type="checkbox" id="livrable" name="livrable" {{ $annonce->livrable ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-indigo-600"><span class="ml-2 text-gray-700">Est-ce que l'article est livrable?</span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier l'annonce</button>
                                    </div>
                                </form>
                                @if(Session::has('succes'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Succès!</strong>
                                        <span class="block sm:inline">{{ Session::get('succes') }}</span>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>



</x-app-layout>
