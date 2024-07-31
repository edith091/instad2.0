<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Équipement | INStaD</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- AdminLTE styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        .table-container {
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials_admin.navbar')
        @include('layouts.partials_admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Détails de l'Équipement : {{ $equipement->nomM }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active">Gestion des Équipements</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Détails de l'Équipement: {{ $equipement->nomM }}</h3>
                        </div>
                        <div class="card-body">
                            <ul>
                                @if ($equipement->carac_id)
                                    @if ($equipement->marque) <li>Marque: {{ $equipement->marque }}</li> @endif
                                    @if ($equipement->modele) <li>Modèle: {{ $equipement->modele }}</li> @endif
                                    @if ($equipement->processor) <li>Processeur: {{ $equipement->processor }}</li> @endif
                                    @if ($equipement->ram) <li>RAM: {{ $equipement->ram }}</li> @endif
                                    @if ($equipement->storage) <li>Stockage: {{ $equipement->storage }}</li> @endif
                                    @if ($equipement->os) <li>OS: {{ $equipement->os }}</li> @endif
                                    @if ($equipement->ecran) <li>Écran: {{ $equipement->ecran }}</li> @endif
                                    @if ($equipement->gpu) <li>GPU: {{ $equipement->gpu }}</li> @endif
                                    @if ($equipement->printer_type) <li>Type d'imprimante: {{ $equipement->printer_type }}</li> @endif
                                    @if ($equipement->print_speed) <li>Vitesse d'impression: {{ $equipement->print_speed }}</li> @endif
                                    @if ($equipement->scanner_type) <li>Type de scanner: {{ $equipement->scanner_type }}</li> @endif
                                    @if ($equipement->resolution) <li>Résolution: {{ $equipement->resolution }}</li> @endif
                                    @if ($equipement->other_type) <li>Type autre: {{ $equipement->other_type }}</li> @endif
                                    @if ($equipement->details) <li>Détails: {{ $equipement->details }}</li> @endif
                                @else
                                    <p>Aucune caractéristique définie pour cet équipement.</p>
                                @endif
                            </ul>
                            <a href="{{ route('equipement-index') }}" class="btn btn-secondary">Retour</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
</body>
</html>
