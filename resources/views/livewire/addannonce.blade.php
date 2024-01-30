<style>
    .form-container {
        max-width: 500px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-control:focus {
        outline: none;
        border-color: #66afe9;
    }

    .form-error {
        color: #ff0000;
        font-size: 14px;
    }

    .form-submit {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .form-submit:hover {
        background-color: #0056b3;
    }
</style>

<div class="w-screen h-screen flex items-center justify-center">
    <div class="form-container">
        <div class="form-header">
            <h2>Ajouter un Produit</h2>
        </div>
        <form wire:submit.prevent="ajouterProduit">
            <div class="form-group">
                <label for="nom" class="form-label">Nom du produit</label>
                <input wire:model="titre" type="text" id="nom" name="titre" class="form-control">
                @error('nom') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea wire:model="description" id="description" name="description" class="form-control"></textarea>
                @error('description') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select wire:model="categorie" id="categorie" name="categorie" class="mt-1 p-2 border rounded-md w-full">
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
                @error('categorie') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="prix" class="form-label">Prix</label>
                <input wire:model="prix" type="text" id="prix" name="prix" class="form-control">
                @error('prix') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="photos" class="form-label">Photos</label>
                <input wire:model="images" type="file" accept="image/png, image/jpeg" id="photos" name="photos" class="form-control">
                @error('photos') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="form-submit">Ajouter Produit</button>
        </form>
    </div>
</div>
