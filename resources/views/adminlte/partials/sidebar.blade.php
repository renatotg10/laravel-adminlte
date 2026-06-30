<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('/admin') }}" class="brand-link">
            <span class="brand-text fw-light">Meu Painel</span>
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

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Cadastros
                            <i class="nav-arrow fas fa-angle-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/usuarios') }}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Usuários</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/produtos') }}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Produtos</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
