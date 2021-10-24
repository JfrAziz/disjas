<div>
    <x-button.black
        onclick="Livewire.emit('openModal', 'kelompok.modal-edit', {{ json_encode(['unvr_id' => $unvr->id]) }})">
        <span>Edit</span>
    </x-button.black>
</div>
