<div>
    <form wire:submit.prevent="handleForm">
        <x-modal.header title="Tambah Data Impor Bulan Terakhir" />
        <x-modal.body>
            <x-input.wrapper>
                <x-input.label for="migas" value="Import Migas" />
                <x-input.text type="number" id="migas" name="migas" wire:model="migas" placeholder="USD Currency, ex : 10000000" />
                <x-input.error for="migas" />
            </x-input.wrapper>

            <x-input.wrapper>
                <x-input.label for="non_migas" value="Import Non Migas" />
                <x-input.text type="number" id="non_migas" name="non_migas" wire:model="non_migas" placeholder="USD Currency 10000000" />
                <x-input.error for="non_migas" />
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
