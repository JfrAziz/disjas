<button {{ $attributes->merge(['type' => 'button']) }}
    class="bg-gray-700 hover:bg-gray-500 text-white active:bg-gray-500 focus:border-gray-500 focus:ring-gray-300 anchor-button">
    {{ $slot }}
</button>
