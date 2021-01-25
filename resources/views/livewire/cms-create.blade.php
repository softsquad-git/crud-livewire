<div class="mb-4">
    <input type="text" aria-label="Wpisz tytuł" required
           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           id="exampleFormControlInput1" placeholder="Wpisz tytuł" wire:model="title">
    @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
</div>

@include('livewire.partials.editor')
@error('description') <span class="text-red-500">{{ $message }}</span> @enderror
<div class="mb-4">
    @foreach($allTags as $tag)
        <label for="{{$tag->id}}"><input type="checkbox" wire:model="tags.{{$tag->id}}" value="{{ $tag->id }}"
                                         id="{{ $tag->id }}" checked="checked" aria-label="{{ $tag->name }}"> {{ $tag->name }}</label>
    @endforeach
</div>
<div class="mb-4">
    <button wire:click.prevent="store()" type="button"
            class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
        Zapisz
    </button>
</div>
