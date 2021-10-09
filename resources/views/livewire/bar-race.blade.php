<div>
    <div class="w-full md:w-auto ml-0 md:ml-2">
        <select wire:model="column" id="column-select"
            class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @foreach ($columnAvailable as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <script src="{{ mix('js/bar-race.js') }}" defer></script>
    <script>
        window.addEventListener('load',  () => {
            runRace(@json($data), '{{ $column }}')
        })
        window.addEventListener('reset-chart', (event) => {
            resetRace()
            runRace(JSON.parse(event.detail.data), event.detail.attribute)
        })
    </script>
</div>
