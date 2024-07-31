

<aside class="main-sidebar sidebar-dark-primary elevation-4" data-sidebarbg="skin5">
    <!-- Brand Logo -->
    <a href="{{ route('admin_dashboard') }}" class="brand-link">
        <img src="{{ asset('build/img/instad1.PNG') }}"  alt="INStaD Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">INStaD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('v3/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Administrateur</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" id="sidebarnav" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('admin_dashboard') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span class="hide-menu">Tableau de Bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('admin.manage_users') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-users"></i>
                        <span class="hide-menu">Gérer les Utilisateurs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('admin.demandes.index') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-tasks"></i>
                        <span class="hide-menu">Gérer les Demandes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('equipement-index') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-tools"></i>
                        <span class="hide-menu">Gérer les Équipements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{-- {{ route('admin.reports') }} --}}" aria-expanded="false">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <span class="hide-menu">Rapports</span>
                    </a>
                </li>
              {{--   <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('admin.feedback') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <span class="hide-menu">Feedback</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('admin.settings') }}" aria-expanded="false">
                        <i class="nav-icon fas fa-cogs"></i>
                        <span class="hide-menu">Paramètres</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-dark" href="{{ route('admin_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <span class="hide-menu">Déconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
