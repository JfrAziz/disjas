@props(['bordered' => false])

@if ($bordered)
    <div class="border-t border-gray-200" />
@endif

<div class="flex justify-center md:justify-end items-center px-5 mb-3 mt-1 text-gray-700">
    {{ $slot }}
</div>
