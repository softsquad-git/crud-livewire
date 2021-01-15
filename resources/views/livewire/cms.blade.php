@push('styles')
    <style>
        .tag {
            display: inline-block;
            background: #e8e8e8;
            padding: 5px;
        }
    </style>
@endpush
<x-slot name="header">
    <h2>CMS</h2>
</x-slot>
<div class="py-12" style="padding: 10px">
    <button wire:click="isCreate()" class="float-right text-white font-bold py-2 px-4 rounded mb-2 @if($isCreate) bg-red-500 hover:bg-red-700 @else bg-green-500 hover:bg-green-700 @endif">
        @if($isCreate) Anuluj @else Dodaj @endif
    </button>
    @if($isCreate)
        @include('livewire.cms-create')
    @endif
    @if($isEdit)
        @include('livewire.cms-edit')
    @endif
    @if($item)
        @include('livewire.cms-item')
    @endif
    @if($data->count() > 0)
        <table class="table-fixed w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 w-20">L.p.</th>
                <th class="px-4 py-2">Tytuł</th>
                <th class="px-4 py-2">Data dodania</th>
                <th class="px-4 py-2">Opcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $item)
                <tr>
                    <td class="border px-4 py-2">{{ $key+1 }}</td>
                    <td class="border px-4 py-2">{{ $item->title }}</td>
                    <td class="border px-4 py-2 text-center">{{ $item->created_at }}</td>
                    <td class="border px-4 py-2 text-center">
                        <button wire:click="find({{ $item->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Zobacz
                        </button>
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
