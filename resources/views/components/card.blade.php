<div class="my-2 mx-2">
    <div class="flex justify-between items-center px-4 sm:px-0">
        @if (isset($title))
            <h4 class="mb-4 flex-1 text-lg font-semibold text-gray-700 dark:text-gray-300 capitalize">
                {{ $title }}
            </h4>
        @endif
        @if (isset($aside))
            <div class="mb-4 ">
                {{ $aside }}
            </div>
        @endif
    </div>
    <div
        {{ $attributes->merge(['class' => 'px-4 py-5 sm:p-6 bg-white sm:rounded-md shadow-md border border-gray-100 text-gray-800']) }}>
        {{ $slot }}
    </div>
</div>
