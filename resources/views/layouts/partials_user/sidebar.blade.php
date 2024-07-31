<aside class="main-sidebar sidebar-dark-primary elevation-4" data-sidebarbg="skin5">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('build/img/instad1.PNG') }}" alt="INStaD Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">INStaD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" id="sidebarnav" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span class="hide-menu">Tableau de Bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('user.faire-demande') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <span class="hide-menu">Faire une Demande</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('demandes.index') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <span class="hide-menu">Mes Demandes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('user.equipements-index') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-th-list"></i>
                        <span class="hide-menu">Mes Équipements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('declare-equipment') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-laptop"></i>
                        <span class="hide-menu">Déclarer Équipements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="" aria-expanded="false">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <span class="hide-menu">Feedback</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <span class="hide-menu">Déconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
