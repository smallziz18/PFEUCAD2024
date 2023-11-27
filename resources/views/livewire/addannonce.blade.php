
<div class="w-screen h-screen flex items-center justify-center">
   <div class="max-w-lg mx-auto">
       <form wire:submit="create">
           {{ $this->form }}
           <livewire:upload-images />

           <div class=" ">
               <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Envoyer</button>
           </div>
       </form>

       <x-filament-actions::modals />

   </div>
</div>
