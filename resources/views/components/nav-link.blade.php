@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center border-b-2 border-emerald-500 px-1 pt-1 text-sm font-bold leading-5 text-zinc-950 transition focus:border-emerald-700 focus:outline-none'
            : 'inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-semibold leading-5 text-zinc-500 transition hover:border-zinc-300 hover:text-zinc-800 focus:border-zinc-300 focus:text-zinc-800 focus:outline-none';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
