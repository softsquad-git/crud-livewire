<x-slot name="header">
    <h2>Tagi</h2>
</x-slot>
<div class="py-12" style="padding: 10px">
    <button wire:click="isCreate()"
            class="float-right text-white font-bold py-2 px-4 rounded mb-2 @if($isCreate) bg-red-500 hover:bg-red-700 @else bg-green-500 hover:bg-green-700 @endif">
        @if($isCreate) Anuluj @else Dodaj @endif
    </button>
    @if($isCreate)
        @include('livewire.tag-create')
    @endif
    @if($isEdit)
       <div style="margin-top: 50px">
           @include('livewire.tag-edit')
       </div>
    @endif
    @if($tags->count() > 0)
        <table class="table-fixed w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 w-20">L.p.</th>
                <th class="px-4 py-2 text-left">Nazwa</th>
                <th class="px-4 py-2">Opcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $key => $item)
                <tr>
                    <td class="border px-4 py-2">{{ $key+1 }}</td>
                    <td class="border px-4 py-2">{{ $item->name }}</td>
                    <td class="border px-4 py-2 text-center">
                        <button wire:click="isEdit({{ $item->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edytuj
                        </button>
                        <button wire:click="delete({{ $item->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Usuń</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert">
            Brak danych do wyświetlenia
        </div>
    @endif
</div>
