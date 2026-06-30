<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel AdminLTE') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 antialiased">
    <div class="min-h-screen overflow-hidden">
        <header class="mx-auto flex w-full max-w-7xl items-center justify-between px-6 py-6 lg:px-8">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-400 text-sm font-black text-zinc-950">LA</span>
                <span class="text-sm font-semibold text-white">{{ config('app.name', 'Laravel AdminLTE') }}</span>
            </a>

            @if (Route::has('login'))
                <nav class="flex items-center gap-2 text-sm font-medium">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="rounded-md bg-white px-4 py-2 text-zinc-950 transition hover:bg-emerald-100">
                            Painel
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-4 py-2 text-zinc-300 transition hover:bg-white/10 hover:text-white">
                            Entrar
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md bg-white px-4 py-2 text-zinc-950 transition hover:bg-emerald-100">
                                Criar conta
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main>
            <section class="mx-auto grid min-h-[calc(100vh-88px)] w-full max-w-7xl items-center gap-12 px-6 pb-16 pt-8 lg:grid-cols-[0.95fr_1.05fr] lg:px-8">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-emerald-200">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        Laravel 13 + Jetstream + Livewire + AdminLTE 4
                    </div>

                    <h1 class="mt-6 max-w-3xl text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl">
                        Base inicial pronta para criar sistemas administrativos.
                    </h1>

                    <p class="mt-6 max-w-xl text-base leading-8 text-zinc-300 sm:text-lg">
                        Um ponto de partida com autenticação, idioma pt_BR, assets organizados no Vite e painel AdminLTE configurado para evoluir sem começar do zero.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-md bg-emerald-400 px-5 py-3 text-sm font-bold text-zinc-950 transition hover:bg-emerald-300">
                                Acessar painel
                            </a>
                        @else
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-md bg-emerald-400 px-5 py-3 text-sm font-bold text-zinc-950 transition hover:bg-emerald-300">
                                    Entrar no sistema
                                </a>
                            @endif
                        @endauth

                        <a href="https://adminlte.io/themes/v4/docs/introduction.html" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-md border border-white/15 px-5 py-3 text-sm font-semibold text-white transition hover:border-sky-300 hover:bg-sky-300/10">
                            Documentação AdminLTE
                        </a>
                    </div>

                    <dl class="mt-10 grid max-w-xl grid-cols-3 gap-4 border-t border-white/10 pt-6">
                        <div>
                            <dt class="text-xs text-zinc-400">Laravel</dt>
                            <dd class="mt-1 text-2xl font-bold text-white">13</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-zinc-400">Idioma</dt>
                            <dd class="mt-1 text-2xl font-bold text-white">pt_BR</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-zinc-400">Painel</dt>
                            <dd class="mt-1 text-2xl font-bold text-white">v4</dd>
                        </div>
                    </dl>
                </div>

                <div class="relative">
                    <div class="relative overflow-hidden rounded-lg border border-white/10 bg-zinc-900 shadow-2xl shadow-black/40">
                        <div class="flex items-center justify-between border-b border-white/10 bg-zinc-950/80 px-4 py-3">
                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-red-400"></span>
                                <span class="h-3 w-3 rounded-full bg-amber-300"></span>
                                <span class="h-3 w-3 rounded-full bg-emerald-400"></span>
                            </div>
                            <span class="rounded bg-white/10 px-3 py-1 text-xs text-zinc-300">/admin</span>
                        </div>

                        <div class="grid min-h-[430px] grid-cols-[76px_1fr] bg-zinc-900 sm:grid-cols-[190px_1fr]">
                            <aside class="border-r border-white/10 bg-zinc-950 p-4">
                                <div class="mb-6 hidden items-center gap-3 sm:flex">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-md bg-emerald-400 text-xs font-black text-zinc-950">A</span>
                                    <div>
                                        <p class="text-sm font-bold text-white">AdminLTE</p>
                                        <p class="text-xs text-zinc-500">Template</p>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <span class="block rounded-md bg-emerald-400 px-3 py-2 text-xs font-semibold text-zinc-950">Dashboard</span>
                                    <span class="block rounded-md bg-white/5 px-3 py-2 text-xs text-zinc-400">Usuários</span>
                                    <span class="block rounded-md bg-white/5 px-3 py-2 text-xs text-zinc-400">Relatórios</span>
                                    <span class="block rounded-md bg-white/5 px-3 py-2 text-xs text-zinc-400">Configurações</span>
                                </div>
                            </aside>

                            <div class="p-5 sm:p-6">
                                <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-xs font-semibold uppercase text-emerald-300">Painel administrativo</p>
                                        <h2 class="mt-1 text-2xl font-bold text-white">Dashboard</h2>
                                    </div>
                                    <span class="w-fit rounded-md bg-sky-400/10 px-3 py-2 text-xs font-semibold text-sky-200">Build validado</span>
                                </div>

                                <div class="grid gap-4 sm:grid-cols-3">
                                    <div class="rounded-lg border border-white/10 bg-white/[0.04] p-4">
                                        <p class="text-xs text-zinc-400">Autenticação</p>
                                        <p class="mt-3 text-xl font-bold text-white">Jetstream</p>
                                    </div>
                                    <div class="rounded-lg border border-white/10 bg-white/[0.04] p-4">
                                        <p class="text-xs text-zinc-400">Interface</p>
                                        <p class="mt-3 text-xl font-bold text-white">Livewire</p>
                                    </div>
                                    <div class="rounded-lg border border-white/10 bg-white/[0.04] p-4">
                                        <p class="text-xs text-zinc-400">Assets</p>
                                        <p class="mt-3 text-xl font-bold text-white">Vite</p>
                                    </div>
                                </div>

                                <div class="mt-4 rounded-lg border border-white/10 bg-white/[0.04] p-4">
                                    <div class="mb-4 flex items-center justify-between">
                                        <p class="text-sm font-semibold text-white">Estrutura pronta</p>
                                        <p class="text-xs text-zinc-500">resources/views</p>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="h-3 w-full rounded bg-emerald-300/70"></div>
                                        <div class="h-3 w-10/12 rounded bg-sky-300/60"></div>
                                        <div class="h-3 w-8/12 rounded bg-amber-300/60"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="border-t border-white/10 bg-white py-14 text-zinc-900">
                <div class="mx-auto grid max-w-7xl gap-6 px-6 lg:grid-cols-3 lg:px-8">
                    <div>
                        <p class="text-sm font-semibold uppercase text-emerald-700">Pronto para clonar</p>
                        <h2 class="mt-2 text-3xl font-bold">Uma base enxuta para novos projetos.</h2>
                    </div>

                    <div class="rounded-lg border border-zinc-200 p-5">
                        <h3 class="text-base font-bold">Autenticação pronta</h3>
                        <p class="mt-2 text-sm leading-6 text-zinc-600">Jetstream, Livewire e Sanctum já compõem o fluxo inicial de login, registro e sessão.</p>
                    </div>

                    <div class="rounded-lg border border-zinc-200 p-5">
                        <h3 class="text-base font-bold">AdminLTE separado</h3>
                        <p class="mt-2 text-sm leading-6 text-zinc-600">Bootstrap e AdminLTE usam arquivos próprios no Vite para evitar conflito com Tailwind.</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
