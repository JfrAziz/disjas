<div>
    <form wire:submit.prevent="handleForm">
        <x-modal.header title="Edit Data" />
        <x-modal.body>
            <x-input.wrapper>
                <x-input.label for="unvr.unvr" value="Harga Saham UNVR" />
                <x-input.text type="number" id="unvr.unvr" wire:model="unvr.unvr"/>
                <x-input.error for="unvr.unvr" />
            </x-input.wrapper>

            <x-input.wrapper>
                <x-input.label for="new_case" value="Kasus Baru Covid-19" />
                <x-input.text type="number" id="new_case" wire:model="new_case" />
                <x-input.error for="new_case" />
            </x-input.wrapper>

            <x-input.wrapper>
                <x-input.label for="unvr.spesimen" value="Spesimen Covid 19" />
                <x-input.text type="number" id="unvr.spesimen" wire:model="unvr.spesimen"/>
                <x-input.error for="unvr.spesimen" />
            </x-input.wrapper>

            @if ($isLastData)
                <div class="flex items-center justify-between">
                    <span>Anda bisa menghapus data terakhir</span>
                    <x-button.error wire:click="delete()">
                        Delete
                    </x-button.error>
                </div>
            @endif

        </x-modal.body>
        <x-modal.footer bordered>

            <x-button.black type="submit">
                <span class="hidden md:block">Submit</span>
                <span class="md:hidden">Submit</span>
            </x-button.black>
            <x-button.error wire:click="$emit('closeModal')">
                Cancel
            </x-button.error>
        </x-modal.footer>
    </form>
</div>
