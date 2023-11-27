<!-- resources/views/livewire/upload-images.blade.php -->

<div class="flex items-center justify-center bg-gray-100 py-12 px-4">

        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <input type="file" wire:model="images" multiple>
            @error('images.*') <span class="error">{{ $message }}</span> @enderror
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M20 8v20m0 0v4h8v-4m-8 4h8m-4-10.75V24m0 0v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <div class="flex text-sm text-gray-600">
                    <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span>Ajouter des images</span>
                        <input id="images" name="images" type="file" wire:model="images" class="sr-only">
                    </label>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 1 Mo</p>
            </div>
            @if ($images)
                <div class="">
                    @foreach ($images as $image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-24 h-24 object-cover" alt="Preview">
                    @endforeach
              @endif
                </div>
        </div>






</div>

