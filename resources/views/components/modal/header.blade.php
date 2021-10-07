@props(['title', 'bordered' => false])

<div class="flex justify-between items-center px-1 my-3 text-gray-700">
    <div class="px-4 text-lg font-medium text-gray-900">
        {{ $title }}
    </div>
</div>

@if ($bordered)
    <div class="border-t border-gray-200"/>
@endif
