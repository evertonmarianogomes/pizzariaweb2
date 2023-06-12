<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href={{ route('admin') }}>Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="navbarToggler">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @can('edit users')
                    <li class="nav-item">
                        <a class="nav-link" href={{route("app.admin.users")}}>Usuários</a>
                    </li>                
                @endcan

                @hasrole('admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Sobre</a>

                        <ul class="dropdown-menu">
                            <li><a href={{ route('app.admin.about') }} class="dropdown-item">Editar "Sobre"</a></li>
                            <li><a href="#" class="dropdown-item" id="aboutModalToggle">About Box</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="aboutModalToggle">Sobre</a>
                    </li>
                @endhasrole

                <li class="nav-item">
                    <a href="/admin/vue/" class="nav-link">Intertia.JS Test Page</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-user-circle"></i> {{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href={{ route('app.admin.editCurrentUser') }} class="dropdown-item">Editar usuário</a>
                        </li>
                        <hr class="dropdown-divider">
                        <li>
                            <a class="dropdown-item" id="btnLogout" href="{{ route('admin.logout') }}">Logout</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-link">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="darkSwitch" />
                        <label class="custom-control-label" for="darkSwitch">Modo Escuro</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
