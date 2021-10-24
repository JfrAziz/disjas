<x-app-layout title="Impor Jawa Timur - Jafar Husaini Aziz">
    <script src="{{ mix('js/chart.js') }}" defer></script>
    <x-card>
        <div class="md:flex md:items-center md:justify-between text-gray-700">
            <div class="text-xl font-bold ">
                Jafar Husaini Aziz
            </div>
            <div class="text-base mt-2 md:m-0">
                Statistik Distribusi & Jasa
            </div>
        </div>
    </x-card>
    <x-separator />
    <x-card title="Impor Jawa Timur">
        @slot('aside')
            @livewire('home.bar-race')
        @endslot
        <div id="chart-race-container" class="w-full" style="height: 800px"></div>
    </x-card>
    <x-separator />
    <x-card>
        <div id="chart-line-container" class="w-full" style="height: 800px"></div>
    </x-card>
    <script>
        window.addEventListener('load',  () => {
            runLineChart(@json(\App\Models\Import::all()))
        })
    </script>
    <x-separator />
    <x-card title="Data">
        @slot('aside')
            <x-button.black onclick="Livewire.emit('openModal', 'modal-add')">
                <div class="mr-2">
                    <i class="gg-math-plus" style="--ggs: 0.6;"></i>
                </div>
                <span>data</span>
            </x-button.black>
        @endslot
        @livewire('home.table')
    </x-card>
</x-app-layout>
