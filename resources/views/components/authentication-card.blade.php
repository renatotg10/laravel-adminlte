<div class="relative flex min-h-screen items-center justify-center overflow-hidden bg-zinc-950 px-6 py-10">
    <div class="grid w-full max-w-6xl items-center gap-10 lg:grid-cols-[0.9fr_1.1fr]">
        <section class="hidden lg:block">
            <div>
                {{ $logo }}
            </div>

            <div class="mt-10 max-w-md">
                <p class="text-sm font-semibold uppercase text-emerald-300">Template inicial</p>
                <h1 class="mt-3 text-4xl font-bold leading-tight text-white">
                    Acesse sua base administrativa.
                </h1>
                <p class="mt-4 text-base leading-7 text-zinc-300">
                    Autenticação Jetstream, interface Livewire, idioma pt_BR e painel AdminLTE preparados para iniciar novos sistemas.
                </p>
            </div>

            <div class="mt-10 grid max-w-lg grid-cols-3 gap-3">
                <div class="rounded-lg border border-white/10 bg-white/[0.04] p-4">
                    <p class="text-xs text-zinc-400">Auth</p>
                    <p class="mt-2 text-sm font-bold text-white">Jetstream</p>
                </div>
                <div class="rounded-lg border border-white/10 bg-white/[0.04] p-4">
                    <p class="text-xs text-zinc-400">UI</p>
                    <p class="mt-2 text-sm font-bold text-white">Livewire</p>
                </div>
                <div class="rounded-lg border border-white/10 bg-white/[0.04] p-4">
                    <p class="text-xs text-zinc-400">Admin</p>
                    <p class="mt-2 text-sm font-bold text-white">AdminLTE</p>
                </div>
            </div>
        </section>

        <section class="mx-auto w-full max-w-md">
            <div class="mb-8 flex justify-center lg:hidden">
                {{ $logo }}
            </div>

            <div class="overflow-hidden rounded-lg border border-white/10 bg-white p-6 shadow-2xl shadow-black/30 sm:p-8">
                @isset($title)
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-zinc-950">{{ $title }}</h2>

                        @isset($description)
                            <p class="mt-2 text-sm leading-6 text-zinc-600">{{ $description }}</p>
                        @endisset
                    </div>
                @endisset

                {{ $slot }}
            </div>

            <p class="mt-6 text-center text-xs text-zinc-500">
                {{ config('app.name', 'Laravel AdminLTE') }} - base Laravel 13 para novos projetos.
            </p>
        </section>
    </div>
</div>
