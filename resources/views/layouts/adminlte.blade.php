<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Painel Administrativo' }}</title>

    @vite(['resources/css/bootstrap-app.css', 'resources/js/bootstrap-app.js', 'resources/css/adminlte.css', 'resources/js/adminlte.js'])
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('adminlte.partials.navbar')
        @include('adminlte.partials.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    @yield('content-header')
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
