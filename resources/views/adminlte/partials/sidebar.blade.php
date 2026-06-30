<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('/admin') }}" class="brand-link">
            <span class="brand-text fw-semibold">{{ config('app.name', 'Laravel AdminLTE') }}</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
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
