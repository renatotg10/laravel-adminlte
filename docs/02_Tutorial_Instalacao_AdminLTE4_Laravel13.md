# Tutorial de instalação do AdminLTE 4 no Laravel 13

Este guia instala e configura o AdminLTE 4 em um projeto Laravel 13 usando Vite.
A ideia é manter os assets do painel separados dos assets padrão do Laravel/Tailwind (`app.css` e `app.js`), evitando conflitos de estilo.

> Se o projeto usa Laravel 12 ou 11, os mesmos passos continuam válidos desde que ele use Vite.

Versões validadas neste tutorial:

- `vite`: 8.1.0
- `laravel-vite-plugin`: 3.1.0
- `admin-lte`: 4.0.2
- `bootstrap`: 5.3.8
- `@fortawesome/fontawesome-free`: 7.3.0
- `overlayscrollbars`: 2.16.0

---

## 1. Instalar as dependências via NPM

Instale AdminLTE 4, Bootstrap, Font Awesome e OverlayScrollbars:

```bash
npm install admin-lte@4.0.2 bootstrap@5.3.8 @fortawesome/fontawesome-free@7.3.0 overlayscrollbars@2.16.0
```

Esses pacotes são usados assim:

- `admin-lte`: tema e scripts do painel.
- `bootstrap`: base visual e componentes JavaScript.
- `@fortawesome/fontawesome-free`: ícones usados nos exemplos abaixo.
- `overlayscrollbars`: dependência usada pelo AdminLTE 4 para barras de rolagem.

---

## 2. Criar os arquivos separados do painel

Crie estes arquivos:

```text
resources/css/bootstrap-app.css
resources/js/bootstrap-app.js
resources/css/adminlte.css
resources/js/adminlte.js
```

O Laravel pode continuar usando `resources/css/app.css` e `resources/js/app.js` para a aplicação principal.

---

## 3. Configurar CSS e JavaScript

### `resources/css/bootstrap-app.css`

```css
@import "bootstrap/dist/css/bootstrap.min.css";
```

### `resources/js/bootstrap-app.js`

```js
import "bootstrap/dist/js/bootstrap.bundle.min.js";
```

### `resources/css/adminlte.css`

```css
@import "overlayscrollbars/overlayscrollbars.css";
@import "@fortawesome/fontawesome-free/css/all.min.css";
@import "admin-lte/dist/css/adminlte.css";
```

### `resources/js/adminlte.js`

```js
import { OverlayScrollbars } from "overlayscrollbars";
import "admin-lte/dist/js/adminlte.js";

document.addEventListener("DOMContentLoaded", () => {
    const sidebarWrapper = document.querySelector(".sidebar-wrapper");

    if (sidebarWrapper) {
        OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: "os-theme-light",
                autoHide: "leave",
                clickScroll: true,
            },
        });
    }
});
```

---

## 4. Atualizar o Vite

Edite `vite.config.js` e inclua os novos arquivos no array `input`.
Como este tutorial não usa Vue.js, não instale `vue` nem `@vitejs/plugin-vue`.
Também não adicione `vue()` nem alias de Vue no `vite.config.js`.

```js
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",

                "resources/css/bootstrap-app.css",
                "resources/js/bootstrap-app.js",
                "resources/css/adminlte.css",
                "resources/js/adminlte.js",
            ],
            refresh: true,
        }),
    ],
});
```
---

## 5. Criar o layout base do AdminLTE

Crie `resources/views/layouts/adminlte.blade.php`:

```blade
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $title ?? 'Painel Administrativo')</title>

    @vite(['resources/css/bootstrap-app.css', 'resources/js/bootstrap-app.js', 'resources/css/adminlte.css', 'resources/js/adminlte.js'])
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('adminlte.partials.navbar')
        @include('adminlte.partials.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    @hasSection('content-header')
                        @yield('content-header')
                    @else
                        <div class="row align-items-center">
                            <div class="col-sm-8">
                                <h1 class="mb-0">@yield('page-title', 'Painel Administrativo')</h1>

                                @hasSection('page-subtitle')
                                    <p class="text-secondary mb-0 mt-1">@yield('page-subtitle')</p>
                                @endif
                            </div>

                            <div class="col-sm-4">
                                @hasSection('breadcrumb')
                                    <ol class="breadcrumb float-sm-end mb-0">
                                        @yield('breadcrumb')
                                    </ol>
                                @else
                                    <ol class="breadcrumb float-sm-end mb-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">@yield('page-title', 'Painel')</li>
                                    </ol>
                                @endif
                            </div>
                        </div>

                        @hasSection('page-actions')
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap gap-2">
                                        @yield('page-actions')
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    @stack('scripts')
</body>

</html>
```

Esse layout permite usar as sections `title`, `page-title`, `page-subtitle`, `breadcrumb`, `page-actions` e `content`.

---

## 6. Criar a navbar

Crie `resources/views/adminlte/partials/navbar.blade.php`:

```blade
<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link" data-lte-toggle="sidebar" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>

            <li class="nav-item d-none d-md-block">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
            </li>

            <li class="nav-item d-none d-md-block">
                <a href="https://adminlte.io/themes/v4/docs/introduction.html" target="_blank" rel="noopener noreferrer" class="nav-link">
                    Documentação
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button">
                        <img
                            src="{{ auth()->user()->profile_photo_url ?? asset('user.png') }}"
                            alt="{{ auth()->user()->name }}"
                            class="rounded-circle"
                            style="width:32px;height:32px;object-fit:cover;"
                        >
                        <span class="ms-2 d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        @if (Route::has('profile.show'))
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="fa-solid fa-user-gear me-2"></i>
                                    Perfil
                                </a>
                            </li>
                        @endif

                        @if (Route::has('logout'))
                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                                        Sair
                                    </button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </li>
            @else
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Entrar</a>
                    </li>
                @endif
            @endauth
        </ul>
    </div>
</nav>
```
---

## 7. Criar a sidebar

Crie `resources/views/adminlte/partials/sidebar.blade.php`:

```blade
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('/admin') }}" class="brand-link">
            <span class="brand-text fw-semibold">{{ config('app.name', 'Laravel AdminLTE') }}</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false"
            >
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">BASE DO PROJETO</li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Estrutura
                            <i class="nav-arrow fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @if (Route::has('profile.show'))
                            <li class="nav-item">
                                <a href="{{ route('profile.show') }}" class="nav-link {{ request()->routeIs('profile.show') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>Perfil</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="https://adminlte.io/themes/v4/docs/introduction.html" target="_blank" rel="noopener noreferrer" class="nav-link">
                                <i class="nav-icon far fa-file-lines"></i>
                                <p>Docs AdminLTE</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
```

---

## 8. Criar uma página starter

Crie `resources/views/adminlte/dashboard.blade.php`:

```blade
@extends('layouts.adminlte')

@section('title', 'Dashboard - Painel Administrativo')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Base Laravel 13 com Jetstream, Livewire e AdminLTE pronta para novos projetos.')

@section('page-actions')
    <a href="{{ url('/') }}" class="btn btn-outline-secondary">
        <i class="fa-solid fa-house me-1"></i>
        Página inicial
    </a>

    <a href="https://adminlte.io/themes/v4/docs/introduction.html" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
        <i class="fa-solid fa-book-open me-1"></i>
        Docs AdminLTE
    </a>
@endsection

@section('content')
    <div class="row g-3">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="small-box text-bg-primary shadow-sm">
                <div class="inner">
                    <h3>13</h3>
                    <p>Laravel</p>
                </div>
                <i class="small-box-icon fa-brands fa-laravel"></i>
                <span class="small-box-footer">Framework da aplicação</span>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="small-box text-bg-success shadow-sm">
                <div class="inner">
                    <h3>Auth</h3>
                    <p>Jetstream</p>
                </div>
                <i class="small-box-icon fa-solid fa-user-shield"></i>
                <span class="small-box-footer">Login, perfil e sessão</span>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="small-box text-bg-warning shadow-sm">
                <div class="inner">
                    <h3>UI</h3>
                    <p>Livewire</p>
                </div>
                <i class="small-box-icon fa-solid fa-wave-square"></i>
                <span class="small-box-footer">Componentes interativos</span>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="small-box text-bg-danger shadow-sm">
                <div class="inner">
                    <h3>4</h3>
                    <p>AdminLTE</p>
                </div>
                <i class="small-box-icon fa-solid fa-table-columns"></i>
                <span class="small-box-footer">Layout administrativo</span>
            </div>
        </div>
    </div>
@endsection
```

O projeto deste repositório inclui uma versão mais completa desse dashboard, com cards, tabela de estrutura e próximos passos.

---

## 9. Criar a rota

Em `routes/web.php`, adicione:

```php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin', function () {
        return view('adminlte.dashboard');
    })->name('admin.dashboard');
});
```

Em projetos com Jetstream, prefira usar o mesmo grupo de middleware criado por ele:

```php
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin', function () {
        return view('adminlte.dashboard');
    })->name('admin.dashboard');
});
```

---

## 10. Rodar o projeto

Durante o desenvolvimento:

```bash
npm run dev
```

Em outro terminal, rode o Laravel:

```bash
php artisan serve
```

Para produção:

```bash
npm run build
```

Depois acesse:

```text
http://127.0.0.1:8000/admin
```

---

## Problemas comuns

### O menu lateral não abre ou não recolhe

Confira se estes arquivos estão carregados no layout:

```blade
@vite([
    'resources/css/bootstrap-app.css',
    'resources/js/bootstrap-app.js',
    'resources/css/adminlte.css',
    'resources/js/adminlte.js',
])
```

Também confirme se o botão da navbar possui `data-lte-toggle="sidebar"`.

### Erro: route [profile.show] not defined

Essa rota só existe se o projeto usa Jetstream ou outro pacote de autenticação que a crie.
O tutorial já protege esse link com `Route::has('profile.show')`.

### Erro: route [logout] not defined

Instale/configure autenticação no Laravel ou remova temporariamente o formulário de logout.
O tutorial já protege esse formulário com `Route::has('logout')`.

### Tailwind alterou algum visual do painel

Use o layout `layouts.adminlte` apenas nas páginas administrativas e mantenha os assets do painel separados de `app.css`.
Evite carregar `resources/css/app.css` dentro do layout do AdminLTE se ele contém Tailwind.

---

## Pronto

Com esses passos, o AdminLTE 4 fica carregado no Laravel 13 via Vite, com Bootstrap separado e sem depender das rotas opcionais de autenticação.
