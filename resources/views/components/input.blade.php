@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md border-zinc-300 bg-white text-zinc-900 shadow-sm transition placeholder:text-zinc-400 focus:border-emerald-500 focus:ring-emerald-500 disabled:cursor-not-allowed disabled:bg-zinc-100 disabled:text-zinc-500']) !!}>
