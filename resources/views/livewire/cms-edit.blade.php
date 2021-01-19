<form>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="">
            <div class="mb-4">
                <input type="text"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="exampleFormControlInput1" placeholder="Wpisz tytuł" wire:model="title">
                @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            @include('livewire.partials.editor')
            <div class="mb-4">
                @foreach($allTags as $tag)
                    <label for="{{$tag->id}}"><input type="checkbox" wire:model="tags.{{ $tag->id }}" value="{{ $tag->id }}"
                                                     id="{{ $tag->id }}" checked="checked" aria-label="{{ $tag->name }}"> {{ $tag->name }}</label>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
<span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
<button wire:click.prevent="update({{$cmsId}})" type="button"
        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
Zapisz
</button>
</span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
<button wire:click="isEdit()" type="button"
        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
Anuluj
</button>
</span>
    </div>
</form>
