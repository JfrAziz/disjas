<x-app-layout>
    <x-card title="Impor Jawa Timur">
        @slot('aside')
            @livewire('bar-race')
        @endslot
        <div id="chart-container" class="w-full" style="height: 800px"></div>
    </x-card>
    <x-separator />
    <x-card title="Data">
        @slot('aside')
            <x-button.black onclick="Livewire.emit('openModal', 'example')">
                <div class="mr-2">
                    <i class="gg-math-plus" style="--ggs: 0.6;"></i>
                </div>
                <span>data</span>
            </x-button.black>
        @endslot
        @livewire('table')
    </x-card>
</x-app-layout>
