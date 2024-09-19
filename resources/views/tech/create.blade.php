<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport | INStaD</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- AdminLTE styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.1.0-beta.1/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials_tech.navbar')
        @include('layouts.partials_tech.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Rapport</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Rapport</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted mb-4">Vous êtes en train de rédiger un rapport pour la tâche sélectionnée. Veuillez décrire en détail le procédé de résolution du problème et toutes les actions entreprises pour résoudre la tâche.</p>
                                    <form action="{{ route('rapports.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="tache_id">Sélectionner une tâche</label>
                                            <select name="tache_id" id="tache_id" class="form-control" required>
                                                <option value="">-- Sélectionner une tâche --</option>
                                                @foreach($taches as $tache)
                                                    <option value="{{ $tache->id }}">
                                                        La tâche terminée le {{ $tache->date_fin }} pour la demande effectuée le {{ $tache->demande->date_demande }} par {{ $tache->demande->user->nom }} {{ $tache->demande->user->prenom }} (ID: {{ $tache->id }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="feedback">Description du Procédé de Résolution</label>
                                            <textarea name="feedback" id="feedback" class="form-control" rows="5" placeholder="Décrivez ici le procédé de résolution du problème..." required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Soumettre le Rapport</button>
                                    </form>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tache_id').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
</body>
</html>