<!DOCTYPE html>
<html dir="ltr" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, css3 dashboard, bootstrap 5 dashboard">
    <meta name="description" content="Admin dashboard template">
    <meta name="robots" content="noindex,nofollow">
    <title>Liste des Équipements Déclarés</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <style>
        .page-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #0d6efd;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-danger {
            background-color: #f44336;
            border-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #e53935;
            border-color: #e53935;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            margin-top: 20px;
            border-top: 1px solid #e9ecef;
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.partials_user.navbar')
        @include('layouts.partials_user.sidebar')


        <div class="content-wrapper">
            <div class="page-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <h4 class="page-title">Modifier équipement</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier équipement</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('equipement.update', $equipment->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="user_name" class="form-label"><i class="fas fa-user"></i> Utilisateur</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="nomM" class="form-label"><i class="fas fa-laptop"></i> Nom de l'équipement</label>
                                                <input type="text" class="form-control" id="nomM" name="nomM" value="{{ old('nomM', $equipment->nomM) }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="codification" class="form-label"><i class="fas fa-barcode"></i> Codification</label>
                                                <input type="text" class="form-control" id="codification" name="codification" value="{{ old('codification', $equipment->codification) }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="etat" class="form-label"><i class="fas fa-info-circle"></i> État</label>
                                                @php
                                                    $declarationDate = new DateTime($equipment->created_at);
                                                    $currentDate = new DateTime();
                                                    $interval = $declarationDate->diff($currentDate);
                                                    $daysDifference = $interval->days;
                                                @endphp
                                                @if ($daysDifference <= 30)
                                                    <select class="form-select" id="etat" name="etat" required>
                                                        <option value="">Sélectionnez l'état</option>
                                                        <option value="Fonctionne normalement" {{ $equipment->etat === 'Fonctionne normalement' ? 'selected' : '' }}>Fonctionne normalement</option>
                                                        <option value="Défectueux" {{ $equipment->etat === 'Défectueux' ? 'selected' : '' }}>Défectueux</option>
                                                        <option value="Bug souvent" {{ $equipment->etat === 'Bug souvent' ? 'selected' : '' }}>Bug souvent</option>
                                                    </select>
                                                @else
                                                    <input type="text" class="form-control" id="etat" name="etat" value="{{ $equipment->etat }}" readonly>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="date_acquisition" class="form-label"><i class="fas fa-calendar-alt"></i> Date d'acquisition</label>
                                                <input type="date" class="form-control" id="date_acquisition" name="date_acquisition" value="{{ old('date_acquisition', $equipment->date_acquisition) }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="idTypeEquipement" class="form-label"><i class="fas fa-list-alt"></i> Type d'équipement</label>
                                                <select class="form-select" id="idTypeEquipement" name="idTypeEquipement" required>
                                                    <option value="">Sélectionnez le type d'équipement</option>
                                                    @foreach($typesEquipement as $typeEquipement)
                                                        <option value="{{ $typeEquipement->idTypeEquipement }}" {{ $typeEquipement->idTypeEquipement === $equipment->idTypeEquipement ? 'selected' : '' }}>{{ $typeEquipement->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Enregistrer les modifications</button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ route('user.equipements-index') }}" class="btn btn-danger w-100"><i class="fas fa-times"></i> Annuler</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#idTypeEquipement').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
</body>

</html>
