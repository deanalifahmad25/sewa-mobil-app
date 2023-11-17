@props(['active'])

@php
$classes = ($active ?? false)
            ? 'item-menu active'
            : 'item-menu';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
