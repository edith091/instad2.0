<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de déclaration d'équipement | INStaD</title>

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
        @include('layouts.partials_user.navbar')
        @include('layouts.partials_user.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Formulaire de déclaration d'équipement</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Advanced Form</li>
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
                                    <form method="POST" action="{{ route('declare-equipment.store') }}">
                                        @csrf
                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="user_name" class="form-label"><i class="fas fa-user"></i> Utilisateur</label>
                                                    <input type="text" class="form-control" id="user_name" name="user_name" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nomM" class="form-label"><i class="fas fa-laptop"></i> Nom de l'équipement</label>
                                                    <input type="text" class="form-control" id="nomM" name="nomM" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="codification" class="form-label"><i class="fas fa-barcode"></i> Codification</label>
                                                    <input type="text" class="form-control" id="codification" name="codification" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="etat" class="form-label"><i class="fas fa-info-circle"></i> État</label>
                                                    <select class="form-control" id="etat" name="etat" required>
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
                                                    <select class="form-control select2bs4" id="idTypeEquipement" name="idTypeEquipement" required>
                                                        <option value="">Sélectionnez un type</option>
                                                        @foreach($typesEquipement as $type)
                                                            <option value="{{ $type->idTypeEquipement }}">{{ $type->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                    
                                        <div class="button-container">
                                            <button type="submit" class="btn btn-primary">Déclarer équipement</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- /.content-wrapper -->

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
        <!-- Select2 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
        <!-- Select2 Bootstrap 4 Theme -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.1.0-beta.1/select2-bootstrap4.min.js"></script>
        <!-- Initialize Select2 -->
        <script>
            $(document).ready(function() {
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                });
            });
        </script>
    </div><!-- ./wrapper -->
</body>
</html>
