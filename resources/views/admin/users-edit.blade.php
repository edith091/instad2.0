<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur | INStaD</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- AdminLTE styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.1.0-beta.1/select2-bootstrap4.min.css">

    <style>
        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .form-label {
            font-weight: 600;
        }

        .breadcrumb-item a {
            color: #0d6efd;
        }

        .breadcrumb-item.active {
            color: #6c757d;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .button-container button, .button-container a {
            margin-left: 10px;
        }

        .form-container {
            padding: 20px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials_admin.navbar')
        @include('layouts.partials_admin.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="page-title">Modifier Utilisateur</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Accueil</a></li>
                                <li class="breadcrumb-item active">Modifier Utilisateur</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title"><i class="fas fa-user-edit"></i> Formulaire de Modification</h3>
                                </div>
                                <div class="card-body form-container">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nom" class="form-label"><i class="fas fa-user"></i> Nom</label>
                                                    <input type="text" name="nom" class="form-control" value="{{ old('nom', $user->nom) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="prenom" class="form-label"><i class="fas fa-user"></i> Prénom</label>
                                                    <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $user->prenom) }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="idDirection" class="form-label"><i class="fas fa-building"></i> Direction</label>
                                                    <select name="idDirection" class="form-control select2bs4">
                                                        <option value="">Aucune</option>
                                                        @foreach ($directions as $direction)
                                                            <option value="{{ $direction->idDirection }}" {{ $user->idDirection == $direction->idDirection ? 'selected' : '' }}>{{ $direction->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bureau" class="form-label"><i class="fas fa-user"></i> Bureau</label>
                                                    <input type="text" name="bureau" class="form-control" value="{{ old('bureau', $user->bureau) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="usertype" class="form-label"><i class="fas fa-user-tag"></i> Type d'utilisateur</label>
                                                    <select name="usertype" class="form-control select2bs4" required>
                                                        <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="technicien" {{ $user->usertype == 'technicien' ? 'selected' : '' }}>Technicien</option>
                                                        <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>Utilisateur</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Mettre à jour</button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ route('admin.manage_users') }}" class="btn btn-danger w-100"><i class="fas fa-times"></i> Annuler</a>
                                            </div>
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
