<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href=<?=$router->route("app.home")?>>Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#aboutModal">Sobre</a>
        </li>
      </ul>

      <div class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle"></i> <text id="username"><?= $user->first_name . " " . $user->last_name ?></text> </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Editar dados</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= $router->route("app.logout") ?>" onclick="return confirm('Certeza que deseja sair?')">Logout</a></li>
                    </ul>
                </li>
                <li class="nav-link">
                    <div class="nav-item form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkSwitch">
                        <label class="form-check-label" for="darkSwitch"><i class="fas fa-adjust"></i> Modo Escuro</label>
                    </div>
                </li>
            </div>

    </div>
  </div>
</nav>