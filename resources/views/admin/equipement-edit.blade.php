

<!DOCTYPE html>
<html dir="ltr" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, css3 dashboard, bootstrap 5 dashboard">
    <meta name="description" content="Admin dashboard template">
    <meta name="robots" content="noindex,nofollow">
    <title>Édition d'équipement</title>
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

        /* Styles pour la sidebar */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 15px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #3f444a;
        }

        .wrapper {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.partials_admin.navbar')
        @include('layouts.partials_admin.sidebar')
        <h2>Édition d'équipement</h2>
        <form method="POST" action="{{ route('admin-equipement.update', $equipement->id) }}">
            @csrf
            @method('PUT')

            <!-- Utilisateur -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_id" class="form-label">Utilisateur</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $equipement->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->nom }} {{ $user->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Nom de l'équipement -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nomM" class="form-label">Nom de l'équipement</label>
                        <input type="text" class="form-control" id="nomM" name="nomM" value="{{ $equipement->nomM }}" required>
                    </div>
                </div>
            </div>

            <!-- Codification -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="codification" class="form-label">Codification</label>
                        <input type="text" class="form-control" id="codification" name="codification" value="{{ $equipement->codification }}" required>
                    </div>
                </div>
            </div>

            <!-- État -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="etat" class="form-label">État</label>
                        <input type="text" class="form-control" id="etat" name="etat" value="{{ $equipement->etat }}" required>
                    </div>
                </div>
            </div>

            <!-- Date d'acquisition -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="date_acquisition" class="form-label">Date d'acquisition</label>
                        <input type="date" class="form-control" id="date_acquisition" name="date_acquisition" value="{{ $equipement->date_acquisition }}" required>
                    </div>
                </div>
            </div>

            <!-- Type d'équipement -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="idTypeEquipement" class="form-label">
                            <i class="fas fa-layer-group"></i> Type d'équipement
                        </label>
                        <select class="form-select" id="idTypeEquipement" name="idTypeEquipement" onchange="updateCharacteristics()" required>
                            <option value="">Sélectionnez un type</option>
                            @foreach($typesEquipement as $type)
                                <option value="{{ $type->idTypeEquipement }}" {{ $equipement->idTypeEquipement == $type->idTypeEquipement ? 'selected' : '' }}>
                                    {{ $type->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Caractéristiques -->
            <div id="characteristics-container" class="row mb-3">
                @if($equipement->caracteristique)
                    @foreach($equipement->caracteristique as $key => $value)
                        <div class="col-md-6 mb-3">
                            <label for="{{ $key }}" class="form-label">{{ ucfirst($key) }}</label>
                            <input type="text" class="form-control" id="{{ $key }}" name="characteristics[{{ $key }}]" value="{{ $value }}">
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Bouton de soumission -->
          
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Mettre à jour</button>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('equipement-index') }}" class="btn btn-danger w-100"><i class="fas fa-times"></i> Annuler</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function updateCharacteristics() {
            const typeEquipement = document.getElementById('idTypeEquipement').value;
            const characteristicsContainer = document.getElementById('characteristics-container');
            characteristicsContainer.innerHTML = '';
    
            switch (typeEquipement) {
                case '1': // Ordinateur
                    characteristicsContainer.innerHTML = `
                        <div class="col-md-6 mb-3">
                            <label for="marque" class="form-label">Marque</label>
                            <input type="text" class="form-control" id="marque" name="characteristics[marque]" value="{{ $equipement->caracteristique['marque'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="modele" class="form-label">Modèle</label>
                            <input type="text" class="form-control" id="modele" name="characteristics[modele]" value="{{ $equipement->caracteristique['modele'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="processor" class="form-label">Processeur</label>
                            <input type="text" class="form-control" id="processor" name="characteristics[processor]" value="{{ $equipement->caracteristique['processor'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ram" class="form-label">RAM</label>
                            <input type="text" class="form-control" id="ram" name="characteristics[ram]" value="{{ $equipement->caracteristique['ram'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="storage" class="form-label">Stockage</label>
                            <input type="text" class="form-control" id="storage" name="characteristics[storage]" value="{{ $equipement->caracteristique['storage'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="os" class="form-label">Système d'exploitation</label>
                            <input type="text" class="form-control" id="os" name="characteristics[os]" value="{{ $equipement->caracteristique['os'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ecran" class="form-label">Écran</label>
                            <input type="text" class="form-control" id="ecran" name="characteristics[ecran]" value="{{ $equipement->caracteristique['ecran'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gpu" class="form-label">Carte graphique</label>
                            <input type="text" class="form-control" id="gpu" name="characteristics[gpu]" value="{{ $equipement->caracteristique['gpu'] ?? '' }}">
                        </div>
                    `;
                    break;
                case '2': // Imprimante
                    characteristicsContainer.innerHTML = `
                        <div class="col-md-6 mb-3">
                            <label for="printer_type" class="form-label">Type d'imprimante</label>
                            <input type="text" class="form-control" id="printer_type" name="characteristics[printer_type]" value="{{ $equipement->caracteristique['printer_type'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="print_speed" class="form-label">Vitesse d'impression</label>
                            <input type="text" class="form-control" id="print_speed" name="characteristics[print_speed]" value="{{ $equipement->caracteristique['print_speed'] ?? '' }}">
                        </div>
                    `;
                    break;
                case '3': // Scanner
                    characteristicsContainer.innerHTML = `
                        <div class="col-md-6 mb-3">
                            <label for="scanner_type" class="form-label">Type de scanner</label>
                            <input type="text" class="form-control" id="scanner_type" name="characteristics[scanner_type]" value="{{ $equipement->caracteristique['scanner_type'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="resolution" class="form-label">Type de scanner</label>
                            <input type="text" class="form-control" id="resolution" name="characteristics[resolution]" value="{{ $equipement->caracteristique['resolution'] ?? '' }}">
                        </div>
                    `;
                    break;
                case '4': // Autre type d'équipement
                    characteristicsContainer.innerHTML = `
                        <div class="col-md-6 mb-3">
                            <label for="other_type" class="form-label">Type d'équipement spécifique</label>
                            <input type="text" class="form-control" id="other_type" name="characteristics[other_type]" value="{{ $equipement->caracteristique['other_type'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="details" class="form-label">Détails</label>
                            <input type="text" class="form-control" id="details" name="characteristics[details]" value="{{ $equipement->caracteristique['details'] ?? '' }}">
                        </div>
                    `;
                    break;
                // Ajoutez d'autres cas selon les types d'équipement
                default:
                    break;
            }
        }
    
        document.addEventListener('DOMContentLoaded', () => {
            updateCharacteristics();
        });
    </script>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>
