<div class="mt-4 mb-4">
    <input type="text" aria-label="Nazwa tagu"
           class="shadow appearance-none border rounded py-2 px-3 w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           placeholder="Wpisz nazwę tagu" wire:model="name">
    <button wire:click.prevent="store()"
            class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-green-600 mt-1 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
        Dodaj
    </button>
</div>
