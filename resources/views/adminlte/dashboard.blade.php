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
        <div class="col-12 col-xl-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-center justify-content-between">
                        <div>
                            <span class="badge text-bg-success mb-3">Template inicial</span>
                            <h2 class="h3 mb-2">Painel administrativo configurado.</h2>
                            <p class="text-secondary mb-0">
                                Use esta tela como referência para criar novas páginas administrativas com Bootstrap,
                                Font Awesome e os componentes do AdminLTE 4.
                            </p>
                        </div>

                        <div class="text-lg-end">
                            <div class="display-6 fw-bold text-primary">v0.1</div>
                            <div class="text-secondary small">base do projeto</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                            <i class="fa-solid fa-bolt fs-4"></i>
                        </div>

                        <div>
                            <div class="text-secondary small">Status dos assets</div>
                            <div class="fw-bold">Vite + AdminLTE ativos</div>
                        </div>
                    </div>

                    <div class="progress mt-4" role="progressbar" aria-label="Assets configurados" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-success" style="width: 100%">100%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-1">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="small-box text-bg-primary shadow-sm">
                <div class="inner">
                    <h3>13</h3>
                    <p>Laravel</p>
                </div>
                <i class="small-box-icon fa-brands fa-laravel"></i>
                <span class="small-box-footer">
                    Framework da aplicação
                </span>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="small-box text-bg-success shadow-sm">
                <div class="inner">
                    <h3>Auth</h3>
                    <p>Jetstream</p>
                </div>
                <i class="small-box-icon fa-solid fa-user-shield"></i>
                <span class="small-box-footer">
                    Login, perfil e sessão
                </span>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="small-box text-bg-warning shadow-sm">
                <div class="inner">
                    <h3>UI</h3>
                    <p>Livewire</p>
                </div>
                <i class="small-box-icon fa-solid fa-wave-square"></i>
                <span class="small-box-footer">
                    Componentes interativos
                </span>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="small-box text-bg-danger shadow-sm">
                <div class="inner">
                    <h3>4</h3>
                    <p>AdminLTE</p>
                </div>
                <i class="small-box-icon fa-solid fa-table-columns"></i>
                <span class="small-box-footer">
                    Layout administrativo
                </span>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-1">
        <div class="col-12 col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title mb-0">
                        <i class="fa-solid fa-layer-group me-2 text-primary"></i>
                        Estrutura recomendada
                    </h3>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Área</th>
                                    <th>Arquivo</th>
                                    <th class="text-end">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Layout</td>
                                    <td><code>resources/views/layouts/adminlte.blade.php</code></td>
                                    <td class="text-end"><span class="badge text-bg-success">Pronto</span></td>
                                </tr>
                                <tr>
                                    <td>Navbar</td>
                                    <td><code>resources/views/adminlte/partials/navbar.blade.php</code></td>
                                    <td class="text-end"><span class="badge text-bg-success">Pronto</span></td>
                                </tr>
                                <tr>
                                    <td>Sidebar</td>
                                    <td><code>resources/views/adminlte/partials/sidebar.blade.php</code></td>
                                    <td class="text-end"><span class="badge text-bg-success">Pronto</span></td>
                                </tr>
                                <tr>
                                    <td>Dashboard</td>
                                    <td><code>resources/views/adminlte/dashboard.blade.php</code></td>
                                    <td class="text-end"><span class="badge text-bg-primary">Exemplo</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title mb-0">
                        <i class="fa-solid fa-list-check me-2 text-success"></i>
                        Próximos passos
                    </h3>
                </div>

                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 d-flex gap-3">
                            <span class="badge rounded-pill text-bg-success align-self-start mt-1">1</span>
                            <div>
                                <div class="fw-semibold">Criar módulos administrativos</div>
                                <div class="text-secondary small">Use este layout para novas páginas do painel.</div>
                            </div>
                        </div>

                        <div class="list-group-item px-0 d-flex gap-3">
                            <span class="badge rounded-pill text-bg-success align-self-start mt-1">2</span>
                            <div>
                                <div class="fw-semibold">Atualizar o menu lateral</div>
                                <div class="text-secondary small">Inclua links reais conforme o domínio do sistema.</div>
                            </div>
                        </div>

                        <div class="list-group-item px-0 d-flex gap-3">
                            <span class="badge rounded-pill text-bg-success align-self-start mt-1">3</span>
                            <div>
                                <div class="fw-semibold">Manter a separação de assets</div>
                                <div class="text-secondary small">Jetstream usa Tailwind; AdminLTE usa Bootstrap.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-body">
                    <a href="{{ url('/user/profile') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-user-gear me-1"></i>
                        Perfil do usuário
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
