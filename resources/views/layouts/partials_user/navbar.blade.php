<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="fas fa-tachometer-alt"></i> Tableau de Bord
            </a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="demandeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-file-alt"></i> Demandes
            </a>
            <ul class="dropdown-menu" aria-labelledby="demandeDropdown">
                <li><a class="dropdown-item {{ Route::is('user.faire-demande') ? 'active' : '' }}" href="{{ route('user.faire-demande') }}">Faire une Demande</a></li>
                <li><a class="dropdown-item {{ Route::is('demandes.index') ? 'active' : '' }}" href="{{ route('demandes.index') }}">Mes Demandes</a></li>
            </ul>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="equipementsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-th-list"></i> Équipements
            </a>
            <ul class="dropdown-menu" aria-labelledby="equipementsDropdown">
                <li><a class="dropdown-item {{ Route::is('user.equipements-index') ? 'active' : '' }}" href="{{ route('user.equipements-index') }}">Mes Équipements</a></li>
                <li><a class="dropdown-item {{ Route::is('declare-equipment') ? 'active' : '' }}" href="{{ route('declare-equipment') }}">Déclarer Équipements</a></li>
            </ul>
            </li>
        </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item d-none d-md-block">
          <a class="nav-link" href="#" data-widget="fullscreen"><i class="fas fa-expand-arrows-alt"></i></a>
        </li>
        <li class="nav-item d-none d-md-block">
          <a class="nav-link" href="#" data-widget="navbar-search"><i class="fas fa-search"></i></a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                <button class="btn" type="button" data-widget="navbar-search"><i class="fas fa-times"></i></button>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Déconnexion
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
