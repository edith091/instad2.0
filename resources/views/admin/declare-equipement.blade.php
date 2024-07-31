<!DOCTYPE html>
<html dir="ltr" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, css3 dashboard, bootstrap 5 dashboard">
    <meta name="description" content="Admin dashboard template">
    <meta name="robots" content="noindex,nofollow">
    <title>Déclarer équipement</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .page-title {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            margin-top: 20px;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.partials_admin.navbar')
        @include('layouts.partials_admin.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <h4 class="page-title">Déclarer équipement</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('declare-equipement.store') }}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="user_name" class="form-label">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</label>
                                            <input type="text" class="form-control" id="user_name" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nomM" class="form-label">Nom de l'équipement</label>
                                            <input type="text" class="form-control" id="nomM" name="nomM" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="codification" class="form-label">Codification</label>
                                            <input type="text" class="form-control" id="codification" name="codification" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="etat" class="form-label"><i class="fas fa-info-circle"></i> État</label>
                                                <select class="form-select" id="etat" name="etat" required>
                                                    <option value="">Sélectionnez l'état</option>
                                                    <option value="Fonctionne normalement">Fonctionne normalement</option>
                                                    <option value="Défectueux">Défectueux</option>
                                                    <option value="Bug souvent">Bug souvent</option>
                                                </select>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_acquisition" class="form-label"><i class="fas fa-calendar-alt"></i> Date d'acquisition</label>
                                                <input type="date" class="form-control" id="date_acquisition" name="date_acquisition" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="idTypeEquipement" class="form-label"><i class="fas fa-layer-group"></i> Type d'équipement</label>
                                                <select class="form-select" id="idTypeEquipement" name="idTypeEquipement" onchange="updateCharacteristics()" required>
                                                    <option value="">Sélectionnez un type</option>
                                                    @foreach($typesEquipement as $type)
                                                        <option value="{{ $type->idTypeEquipement }}">{{ $type->nom }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>    
                                    <div id="characteristics-container" class="mb-3"></div>
                                    <button type="submit" class="btn btn-primary">Déclarer équipement</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                <div class="container">
                    Tous droits réservés par Admin. Conçu et développé par <a href="https://wrappixel.com">WrapPixel</a>.
                </div>
            </footer>
        </div>
    </div>
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/custom.min.js"></script>
    <script>
        function updateCharacteristics() {
            var select = document.getElementById('idTypeEquipement');
            var characteristicsContainer = document.getElementById('characteristics-container');
            var selectedValue = select.value;

            characteristicsContainer.innerHTML = '';

            switch (selectedValue) {
                case '1':
                    characteristicsContainer.innerHTML = `
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="marque" class="form-label">Marque</label>
                                <input type="text" class="form-control" id="marque" name="characteristics[marque]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="modele" class="form-label">Modèle</label>
                                <input type="text" class="form-control" id="modele" name="characteristics[modele]" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="processor" class="form-label">Processeur</label>
                                <input type="text" class="form-control" id="processor" name="characteristics[processor]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="ram" class="form-label">RAM</label>
                                <input type="text" class="form-control" id="ram" name="characteristics[ram]" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="storage" class="form-label">Stockage</label>
                                <input type="text" class="form-control" id="storage" name="characteristics[storage]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="os" class="form-label">Système d'exploitation</label>
                                <input type="text" class="form-control" id="os" name="characteristics[os]" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ecran" class="form-label">Taille de l'écran</label>
                                <input type="text" class="form-control" id="ecran" name="characteristics[ecran]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="gpu" class="form-label">Carte Graphique</label>
                                <input type="text" class="form-control" id="gpu" name="characteristics[gpu]" required>
                            </div>
                        </div>
                    `;
                    break;
                case '2':
                    characteristicsContainer.innerHTML = `
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="printer_type" class="form-label">Type d'imprimante</label>
                                <input type="text" class="form-control" id="printer_type" name="characteristics[printer_type]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="print_speed" class="form-label">Vitesse d'impression</label>
                                <input type="text" class="form-control" id="print_speed" name="characteristics[print_speed]" required>
                            </div></div>
                    `;
                    break;
                case '3':
                    characteristicsContainer.innerHTML = `
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="scanner_type" class="form-label">Type de scanner</label>
                                <input type="text" class="form-control" id="scanner_type" name="characteristics[scanner_type]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="resolution" class="form-label">Résolution</label>
                                <input type="text" class="form-control" id="resolution" name="characteristics[resolution]" required>
                            </div>
                        </div>
                    `;
                    break;
                case '4':
                    characteristicsContainer.innerHTML = `
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="other_type" class="form-label">Type</label>
                                <input type="text" class="form-control" id="other_type" name="characteristics[other_type]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="details" class="form-label">Détails</label>
                                <input type="text" class="form-control" id="details" name="characteristics[details]" required>
                            </div>
                        </div>
                    `;
                    break;
            }
        }
    </script>
</body>

</html>