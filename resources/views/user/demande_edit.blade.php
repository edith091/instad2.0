<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la demande | INStaD</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- AdminLTE styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.1.0-beta.1/select2-bootstrap4.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">

    <style>
        .card-container {
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .form-control {
            border-radius: 0.25rem;
        }
        .form-group label {
            font-weight: bold;
        }
        /* Couleur personnalisée pour les boutons Mettre à jour et Annuler */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials_user.navbar')
        @include('layouts.partials_user.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Modifier la demande</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Modifier la demande</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="card card-container">
                        <div class="card-header">
                            <h3>Modifier la demande</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('demandes.update', $demande->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="equipement_id">Codification</label>
                                    <select class="form-control select2" id="equipement_id" name="equipement_id" style="width: 100%;">
                                        @foreach($equipements as $equipement)
                                            <option value="{{ $equipement->id }}" {{ $demande->equipement_id == $equipement->id ? 'selected' : '' }}>
                                                {{ $equipement->nomM }}  ----{{ $equipement->codification }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $demande->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date_demande">Date de la demande</label>
                                    <input type="date" class="form-control" id="date_demande" name="date_demande" value="{{$demande->date_demande}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="priorite">Priorité</label>
                                    <select class="form-control" id="priorite" name="priorite">
                                        <option value="gênant" {{ $demande->priorite == 'gênant' ? 'selected' : '' }}>gênant</option>
                                        <option value="bloquant" {{ $demande->priorite == 'bloquant' ? 'selected' : '' }}>bloquant</option>
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <a href="{{ route('demandes.index') }}" class="btn btn-danger w-100"><i class="fas fa-times"></i> Annuler</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="footer">
            <div class="container">
                Tous droits réservés par INStaD Bénin. Conçu et développé par <a href="https://wrappixel.com">WrapPixel</a>.
            </div>
        </footer>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>
</html>
