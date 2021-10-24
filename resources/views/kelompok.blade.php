<x-app-layout title="Grafik Dinamis Harga Saham UNVR dan Rasio Kasus Baru Terhadap Covid 19">
    <script src="{{ mix('js/unvr-chart.js') }}" defer></script>
    <x-card title="Grafik Dinamis Harga Saham UNVR dan Rasio Kasus Baru Terhadap Covid 19">
        <div id="chart-line-container" class="w-full" style="height: 800px"></div>
    </x-card>
    <script>
        window.addEventListener('load',  () => {
            runLineChart(@json(\App\Models\Unvr::all()))
        })
    </script>
    <x-separator />
    <x-card title="Rata-rata mingguan">
        @livewire('kelompok.table')
    </x-card>
    <x-separator />
    <div class="grid lg:grid-cols-4 md:grid-cols-2">
        <x-card>
            <div class="text-lg font-bold text-gray-600">
                Jafar Husaini Aziz
            </div>
        </x-card>
        <x-card>
            <div class="text-lg font-bold text-gray-600">
                Paramitha Madelin Albright
            </div>
        </x-card>
        <x-card>
            <div class="text-lg font-bold text-gray-600">
                Yudistira Elton Jhon
            </div>
        </x-card>
        <x-card>
            <div class="text-base mt-2 md:m-0">
                Statistik Distribusi & Jasa
            </div>
        </x-card>
    </div>
    
</x-app-layout>
