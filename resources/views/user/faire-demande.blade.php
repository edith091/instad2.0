<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de demande | INStaD</title>

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
        .form-material {
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .form-material h2 {
            margin-bottom: 1.5rem;
        }
        .float-label {
            font-weight: bold;
            color: #333;
        }
        .form-group input, .form-group textarea, .form-group select {
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ced4da;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .button-container {
            text-align: right;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 20px;
            padding: 0.5rem 2rem;
        }
        .breadcrumb-item a {
            color: #007bff;
        }
        .breadcrumb-item.active {
            color: #6c757d;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 1rem;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }
        .card-body {
            margin: 2rem;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials_user.navbar')
        @include('layouts.partials_user.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Formulaire de demande</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Formulaire de demande</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('demandes.store') }}" method="POST" class="form-material">
                                @csrf
                                <h2>Formulaire de demande</h2>
                                <div class="row">
                                    <!-- Utilisateur -->
                                    <div class="form-group col-md-6">
                                        <label for="user" class="float-label">Utilisateur:</label>
                                        <input type="text" id="user" name="user" class="form-control" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
                                    </div>
                                    <!-- Date de la demande -->
                                    <div class="form-group col-md-6">
                                        <label for="date_demande" class="float-label">Date de la demande:</label>
                                        <input type="date" id="date_demande" name="date_demande" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Équipement -->
                                    <div class="form-group col-md-6">
                                        <label for="equipement_id" class="float-label">Nom de l'équipement et codification:</label>
                                        <select class="form-control" id="equipement_id" name="equipement_id">
                                            @foreach($equipements as $equipement)
                                                <option value="{{ $equipement->id }}">
                                                    {{ $equipement->nomM }} - {{ $equipement->codification }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Priorité -->
                                    <div class="form-group col-md-6">
                                        <label for="priorite" class="float-label">Priorité:</label>
                                        <select class="form-control" id="priorite" name="priorite">
                                            <option value="gênant">Gênant</option>
                                            <option value="bloquant">Bloquant</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description" class="float-label">Description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                                <!-- Bouton de soumission -->
                                <div class="form-group button-container">
                                    <button type="submit" class="btn btn-primary">Soumettre</button>
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
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#equipement_id').select2({
                theme: 'bootstrap4',
                width: '100%'
            });
        });
    </script>
</body>
</html>
