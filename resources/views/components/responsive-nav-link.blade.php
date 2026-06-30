@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full border-l-4 border-emerald-500 bg-emerald-50 py-2 pe-4 ps-3 text-start text-base font-bold text-emerald-800 transition focus:border-emerald-700 focus:bg-emerald-100 focus:text-emerald-900 focus:outline-none'
            : 'block w-full border-l-4 border-transparent py-2 pe-4 ps-3 text-start text-base font-semibold text-zinc-600 transition hover:border-zinc-300 hover:bg-zinc-50 hover:text-zinc-900 focus:border-zinc-300 focus:bg-zinc-50 focus:text-zinc-900 focus:outline-none';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
