<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link" data-lte-toggle="sidebar" role="button" aria-label="Alternar menu">
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
                        <img src="{{ auth()->user()->profile_photo_url ?? asset('user.png') }}"
                            alt="{{ auth()->user()->name }}" class="rounded-circle"
                            style="width:32px;height:32px;object-fit:cover;">
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
