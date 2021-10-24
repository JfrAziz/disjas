<div>
    <form wire:submit.prevent="handleForm">
        <x-modal.header title="Tambah Data Impor Bulan Terakhir" />
        <x-modal.body>
            <x-input.wrapper>
                <x-input.label for="unvr" value="Harga Saham UNVR" />
                <x-input.text type="number" id="unvr" wire:model="unvr"/>
                <x-input.error for="unvr" />
            </x-input.wrapper>

            <x-input.wrapper>
                <x-input.label for="new_case" value="Kasus Baru Covid-19" />
                <x-input.text type="number" id="new_case" wire:model="new_case" />
                <x-input.error for="new_case" />
            </x-input.wrapper>

            <x-input.wrapper>
                <x-input.label for="spesimen" value="Spesimen Covid 19" />
                <x-input.text type="number" id="spesimen" wire:model="spesimen"/>
                <x-input.error for="spesimen" />
            </x-input.wrapper>

        </x-modal.body>
        <x-modal.footer bordered>
            <div class="ml-2">
                <x-button.black type="submit">
                    <span class="hidden md:block">Submit</span>
                    <span class="md:hidden">Submit</span>
                </x-button.black>
            </div>
            <div class="ml-2">
                <x-button.error wire:click="$emit('closeModal')">
                    Cancel
                </x-button.error>
            </div>
        </x-modal.footer>
    </form>
</div>
