<div>
    <x-button.black
        onclick="Livewire.emit('openModal', 'home.modal-edit', {{ json_encode(['import_id' => $import->id]) }})">
        <span>Edit</span>
    </x-button.black>
</div>
