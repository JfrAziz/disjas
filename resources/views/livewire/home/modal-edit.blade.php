<div>
    <form wire:submit.prevent="handleForm">
        <x-modal.header title="Tambah Data Impor Bulan Terakhir" />
        <x-modal.body>
            <x-input.wrapper>
                <x-input.label for="import.migas" value="Import Migas" />
                <x-input.text type="number" id="migas" wire:model="import.migas"
                    placeholder="USD Currency, ex : 10000000" />
                <x-input.error for="import.migas" />
            </x-input.wrapper>

            <x-input.wrapper>
                <x-input.label for="import.non_migas" value="Import Non Migas" />
                <x-input.text type="number" id="non_migas" name="import.non_migas" wire:model="import.non_migas"
                    placeholder="USD Currency 10000000" />
                <x-input.error for="import.non_migas" />
            </x-input.wrapper>

            @if ($isLastImport)
                <div class="flex items-center justify-between">
                    <span>Anda bisa menghapus data import di bulan terakhir</span>
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
