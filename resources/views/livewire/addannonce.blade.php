
<div class="w-screen h-screen flex items-center justify-center">
    <div>
        <form wire:submit.prevent="ajouterProduit">
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                <input wire:model="titre" type="text" id="nom" name="titre" class="mt-1 p-2 border rounded-md w-full">
                @error('nom') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea wire:model="description" id="description" name="description" class="mt-1 p-2 border rounded-md w-full"></textarea>

                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Catégorie</label>

                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="appartement" value="appartement" class="mr-2">
                    <label for="appartement">Appartement</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="voiture" value="voiture" class="mr-2">
                    <label for="voiture">Voiture</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="meubles" value="meubles" class="mr-2">
                    <label for="meubles">Meubles</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="électronique" value="électronique" class="mr-2">
                    <label for="électronique">Électronique</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="vêtements" value="vêtements" class="mr-2">
                    <label for="vêtements">Vêtements</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="accessoires" value="accessoires" class="mr-2">
                    <label for="accessoires">Accessoires</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="autre" value="autre" class="mr-2">
                    <label for="autre">autre</label>
                </div>

            </div>




            <div class="mb-4">
                <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
                <input wire:model="prix" type="text" id="prix" name="prix" class="mt-1 p-2 border rounded-md w-full">
                @error('prix') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="photos" class="block text-sm font-medium text-gray-700">Photos</label>
                <input wire:model="images" type="file" accept="image/png , image/jpeg" id="photos" name="images" class="mt-1 p-2 border rounded-md w-full">
                @error('photos') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Ajouter Produit</button>
        </form>
    </div>
</div>
