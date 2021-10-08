<div>
    <x-button.black
        onclick="Livewire.emit('openModal', 'modal-edit', {{ json_encode(['import_id' => $import->id]) }})">
        <span>Edit</span>
    </x-button.black>
</div>
