<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-md border border-transparent bg-emerald-500 px-4 py-2.5 text-xs font-bold uppercase text-zinc-950 transition hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 active:bg-emerald-600 disabled:opacity-50']) }}>
    {{ $slot }}
</button>
