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
