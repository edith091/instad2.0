<aside class="main-sidebar sidebar-dark-primary elevation-4">
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
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Tableau de Bord</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('my-tasks') }}" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Mes Tâches</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('historiques-taches') }}" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Historique des Tâches</p>
                    </a>
                </li>{{-- 
                <li class="nav-item">
                    <a href="update-status.html" class="nav-link">
                        <i class="nav-icon fas fa-sync-alt"></i>
                        <p>Mettre à Jour le Statut</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('rapports.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Rapports</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="feedback.html" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Feedback</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="nav-link" style="margin: 0; padding: 0;">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Déconnexion</p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
