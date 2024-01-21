
<div class="w-screen h-screen flex items-center justify-center">
    <div>
        <form wire:submit.prevent="ajouterProduit">
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                <input wire:model="titre" type="text" id="nom" name="nom" class="mt-1 p-2 border rounded-md w-full">
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
                        <input wire:model="categorie" name="categorie" type="radio" id="1" value="1" class="mr-2">
                        <label for="1">1</label>
                    </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="2" value="2" class="mr-2">
                    <label for="2">2</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="3" value="3" class="mr-2">
                    <label for="3">3</label>
                </div>
                <div class="flex items-center">
                    <input wire:model="categorie" name="categorie" type="radio" id="4" value="4" class="mr-2">
                    <label for="4">4</label>
                </div>

            </div>

            <div class="mb-4">
                <label for="descriptionDetaillee" class="block text-sm font-medium text-gray-700">Description détaillée</label>
                <textarea wire:model="descriptionDetaillee" id="descriptionDetaillee" name="descriptionDetaillee" class="mt-1 p-2 border rounded-md w-full"></textarea>
                @error('descriptionDetaillee') <span class="text-red-500">{{ $message }}</span> @enderror
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
