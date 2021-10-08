<x-app-layout>
    <x-card title="Chart">
        <div id="main" class="w-full h-screen"></div>
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
    <script src="{{ mix('js/bar-race.js') }}"></script>
    <script>
        runRace(@json(\App\Models\Import::all()))
    </script>
</x-app-layout>
