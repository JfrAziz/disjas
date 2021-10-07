<div>
    <form wire:submit.prevent="handleForm">
        <x-modal.header title="Delete User" />
        <x-modal.body>
            <x-input.wrapper>
                <x-input.label for="password" value="Confirm Your password" />
                <x-input.text type="password" id="password" name="password" wire:model="password"
                    placeholder="your password" />
                <x-input.error for="password" />
            </x-input.wrapper>

        </x-modal.body>
        <x-modal.footer bordered>
            <div class="ml-2">
                <x-button.black type="submit">
                    <span class="hidden md:block">Delete</span>
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
