<div>
    <!-- Formulaire de recherche -->
    <form wire:submit.prevent="search" class="p-4 bg-gray-100 rounded-lg shadow-md">
        <!-- Champ de recherche par titre -->
        <input type="text" wire:model.lazy="searchTerm" placeholder="Rechercher par titre..." class="w-full px-4 py-2 mb-2 border rounded-lg focus:outline-none focus:border-blue-500">

        <!-- Sélection de catégorie -->
        <select wire:model.lazy="category" id="category" class="w-full px-4 py-2 mb-2 border rounded-lg focus:outline-none focus:border-blue-500">
            <option value="">Toutes les catégories</option>
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

        <!-- Prix minimal et maximal -->
        <input type="text" wire:model.lazy="minPrice" placeholder="Prix minimum" class="w-1/2 px-4 py-2 mb-2 mr-2 border rounded-lg focus:outline-none focus:border-blue-500">
        <input type="text" wire:model.lazy="maxPrice" placeholder="Prix maximum" class="w-1/2 px-4 py-2 mb-2 border rounded-lg focus:outline-none focus:border-blue-500">

        <!-- Bouton de soumission -->

    </form>

    <!-- Résultats de la recherche -->
    <ul class="mt-4">
        @if(!empty($annonces))
            @foreach($annonces as $annonce)
                <a href="{{ url('/annonce=' . $annonce->id) }}">
                  <p class="mb-2">{{ $annonce->titre }} - {{ $annonce->prix }} €</p>
              </a>
            @endforeach
        @else
            <li>Aucun résultat trouvé</li>
        @endif
    </ul>
</div>

