<x-app-layout>
    <x-card>
        <div class="md:flex md:items-center md:justify-between text-gray-700">
            <div class="text-lg font-bold text-gray-600">
                <ul>
                    <li>Jafar Husaini Aziz</li>
                    <li>Paramitha Madelin Albright</li>
                    <li>Yudistira Elton Jhon</li>
                </ul>
            </div>
            <div class="text-base mt-2 md:m-0">
                Statistik Distribusi & Jasa
            </div>
        </div>
    </x-card>
    <x-separator />
    <script src="{{ mix('js/unvr-chart.js') }}" defer></script>
    <x-card title="grafik model">
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
</x-app-layout>
