<button {{ $attributes->merge(['type' => 'button']) }}
    class="bg-red-500 hover:bg-red-400 text-white active:bg-red-400 focus:border-red-400 focus:ring-red-300 anchor-button">
    {{ $slot }}
</button>
