<a {{ $attributes->merge(['href' => $href ?? '#', 'class' => 'text-indigo-700 hover:text-indigo-400 transition']) }}>
    {{ $slot }}
</a>
