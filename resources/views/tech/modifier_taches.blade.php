<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Tâche | TechnicienDashboard | INStaD</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- AdminLTE styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        .form-container {
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
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
                            <h1>Modifier Tâche</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Modifier Tâche</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card form-container">
                        <div class="card-body">
                            <h2 class="form-title">Modifier Tâche</h2>
                            <form action="{{ route('equipement_taches.update', $tache->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control" required>{{ $tache->demande->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="date_debut">Date de Début</label>
                                    <input type="date" id="date_debut" name="date_debut" class="form-control" value="{{ $tache->date_debut }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="date_fin">Date de Fin</label>
                                    <input type="date" id="date_fin" name="date_fin" class="form-control" value="{{ $tache->date_fin }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="statut">Statut</label>
                                    <select id="statut" name="statut" class="form-control" required>
                                        <option value="en cours" {{ $tache->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                                        <option value="terminée" {{ $tache->statut == 'terminée' ? 'selected' : '' }}>Terminée</option>
                                        <option value="en attente" {{ $tache->statut == 'en attente' ? 'selected' : '' }}>En attente</option>
                                        <option value="annulée" {{ $tache->statut == 'annulée' ? 'selected' : '' }}>Annulée</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="utilisateur">Utilisateur</label>
                                    <input type="text" id="utilisateur" class="form-control" value="{{ $tache->demande->user->prenom }} {{ $tache->demande->user->nom }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="direction">Direction</label>
                                    <input type="text" id="direction" class="form-control" value="{{ $tache->demande->user->direction->nom }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="bureau">Bureau</label>
                                    <input type="text" id="bureau" class="form-control" value="{{ $tache->demande->user->bureau }}" readonly>
                                </div>

                                <div class="form-group" id="feedback-container" style="display: none;">
                                    <label for="feedback">Feedback</label>
                                    <textarea id="feedback" name="feedback" class="form-control">{{ $tache->feedback }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                                <a href="{{ route('my-tasks') }}" class="btn btn-secondary">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function () {
            const statutField = $('#statut');
            const feedbackContainer = $('#feedback-container');

            function toggleFeedbackField() {
                if (statutField.val() === 'terminée') {
                    feedbackContainer.show();
                } else {
                    feedbackContainer.hide();
                }
            }

            statutField.on('change', toggleFeedbackField);
            toggleFeedbackField(); // Initial check
        });
    </script>
</body>
</html>
