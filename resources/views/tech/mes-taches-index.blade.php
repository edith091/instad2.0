<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Tâches | TechnicienDashboard | INStaD</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- AdminLTE styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

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
        @include('layouts.partials_tech.navbar')
        @include('layouts.partials_tech.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Mes Tâches en Cours</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Mes Tâches en Cours</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="card table-container">
                        <div class="card-body">
                            <!-- Table -->
                            <table class="table table-bordered table-hover" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th>Description</th>
                                        <th>Statut</th>
                                        <th>Date d'affectation</th>
                                        <th>Date de Début</th>
                                        <th>Date de Fin</th>
                                        <th>Utilisateur</th>
                                        <th>Direction</th>
                                        <th>Bureau</th>
                                        <th>Feedback</th>
                                        <th>Action</th> <!-- Cette colonne est visible -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($taches as $tache)
                                    <tr>
                                        <td>DEM00{{ $loop->index+1 }}</td>
                                        <td>{{ $tache->demande->description }}</td>
                                        <td>
                                            @switch($tache->statut)
                                            @case('en cours')
                                            <span class="badge badge-primary">{{ $tache->statut }}</span>
                                            @break
                                            @case('terminée')
                                            <span class="badge badge-success">{{ $tache->statut }}</span>
                                            @break
                                            @case('en attente')
                                            <span class="badge badge-info">{{ $tache->statut }}</span>
                                            @endswitch
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($tache->created_at)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tache->date_debut)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tache->date_fin)->format('d/m/Y') }}</td>
                                        <td>{{ $tache->demande->user->prenom }} {{ $tache->demande->user->nom }}</td>
                                        <td>{{ $tache->demande->user->direction->nom }}</td>
                                        <td>{{ $tache->demande->user->bureau }}</td>
                                        <td>{{ $tache->feedback ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Actions">
                                               {{--  <a href="{{ route('equipement_taches.editer', $tache->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                                <form action="{{ route('equipement_taches.supprimer', $tache->id) }}" method="POST" style="display: inline;" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                                </form> --}}
                                                <form action="{{ route('technicien.declareIndisponible', $tache->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-warning">Déclarer Indisponible</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="pagination-container">
                                {{ $taches->links('pagination::bootstrap-4') }}
                            </div>
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

    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example2").DataTable({
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false,
                "buttons": [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude last column (Action)
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude last column (Action)
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude last column (Action)
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:last-child)' // Exclude last column (Action)
                        }
                    },
                    'colvis'
                ]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>
