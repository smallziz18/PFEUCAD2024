<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter Annonce') }}
        </h2>
    </x-slot>
    <div class="form-container">
        <div class="form-header">
            <h2>Ajouter un Produit</h2>
        </div>
        <form method="post"  enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nom" class="form-label">Nom du produit</label>
                <input type="text" id="nom" name="nom" class="form-control">
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select id="categorie" name="categorie" class="mt-1 p-2 border rounded-md w-full">
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

            <div class="form-group">
                <label for="prix" class="form-label">Prix</label>
                <input type="text" id="prix" name="prix" class="form-control">
            </div>
            <div class="form-group">
            <label>Produit livrable :</label><br>
            <input type="radio" id="livrable_oui" name="livrable" value="1" >
            <label for="livrable_oui">Oui</label><br>
            <input type="radio" id="livrable_non" name="livrable" value="0" >
            <label for="livrable_non">Non</label>
            </div>

            <div class="form-group">
                <label for="photos" class="form-label">Photos</label>
                <input type="file" accept="image/png, image/jpeg" id="photos" name="images[]" class="form-control" multiple>
            </div>

            <button type="submit" class="form-submit">Ajouter Produit</button>
        </form>
    </div>

</x-app-layout>
