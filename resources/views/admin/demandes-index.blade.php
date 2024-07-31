<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des demandes | AdminDashboard | INStaD</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- AdminLTE styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.1.0-beta.1/select2-bootstrap4.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('../../dist/css/adminlte.min2167.css?v=3.2.0')}}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.min2167.css?v=3.2.0') }}">
    
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
        .search-bar {
            margin-bottom: 1rem;
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
                            <h1>Liste des demandes</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Liste des demandes</li>
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
                            <!-- Search Bar -->
                           {{--  <div class="row search-bar">
                                <div class="col-md-4">
                                    <form action="{{ route('admin.demandes.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Rechercher...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}

                            <!-- Table -->
                            <table class="table table-bordered table-hover" id="demandesTable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th>Utilisateur</th>
                                        <th>Équipement</th>
                                        <th>Description</th>
                                        <th>Date de la demande</th>
                                        <th>Priorité</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($demandes as $demande)
                                    <tr>
                                        <td>DEM00{{ $loop->index+1 }}</td>
                                        <td>{{ $demande->user->nom }} {{ $demande->user->prenom }}</td>
                                        <td>{{ $demande->equipement->nomM }} - {{ $demande->equipement->codification }}</td>
                                        <td>{{ $demande->description }}</td>
                                        <td>{{ $demande->date_demande }}</td>
                                        <td>{{ $demande->priorite }}</td>
                                        <td>
                                            @switch($demande->statut)
                                                @case('en cours')
                                                    <span class="badge badge-primary">{{ $demande->statut }}</span>
                                                    @break
                                                @case('traité')
                                                    <span class="badge badge-success">{{ $demande->statut }}</span>
                                                    @break
                                                @case('affecté')
                                                    <span class="badge badge-info">{{ $demande->statut }}</span>
                                                    @break
                                                @case('non traité')
                                                    <span class="badge badge-warning">{{ $demande->statut }}</span>
                                                    @break
                                                @case('rejeté')
                                                    <span class="badge badge-danger">{{ $demande->statut }}</span>
                                                    @break
                                                @case('indisponible')
                                                    <span class="badge badge-secondary">{{ $demande->statut }}</span>
                                                    <p>{{ $demande->motif_indisponibilite }}</p>
                                                    @break
                                                @default
                                                    <span class="badge badge-secondary">{{ $demande->statut }}</span>
                                            @endswitch
                                        </td>
                                                                                   
                                        <td>
                                            <a href="{{ route('admin.demandes.edit', $demande->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.demandes.destroy', $demande->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <!-- Bouton pour afficher le modal -->
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#assignModal-{{ $demande->id }}">
                                                Affecter
                                            </button>
                                            <button class="btn btn-secondary btn-sm" type="button" data-toggle="modal" data-target="#indisponibiliteModal-{{ $demande->id }}">
                                                Indisponibilité
                                            </button>
                                            <!-- Modal pour sélectionner un technicien -->
                                            <div class="modal fade" id="assignModal-{{ $demande->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $demande->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="assignModalLabel{{ $demande->id }}">Affecter la demande</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- Formulaire d'affectation -->
                                                        <form action="{{ route('admin.demandes.assign', $demande->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="technicien_id">Sélectionner un technicien</label>
                                                                    <select name="technicien_id" class="form-control" required>
                                                                        @foreach($techniciens as $technicien)
                                                                            <option value="{{ $technicien->id }}">{{ $technicien->nom }} {{ $technicien->prenom }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                <button type="submit" class="btn btn-primary">Affecter</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal pour ajouter motif d'indisponibilité -->
                                            <div class="modal fade" id="indisponibiliteModal-{{ $demande->id }}" tabindex="-1" role="dialog" aria-labelledby="indisponibiliteModalLabel{{ $demande->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="indisponibiliteModalLabel{{ $demande->id }}">Indisponibilité de la demande</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- Formulaire pour motif d'indisponibilité -->
                                                        <form action="{{ route('admin.demandes.indisponibilite', $demande->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="motif_indisponibilite">Motif d'indisponibilité</label>
                                                                    <textarea name="motif_indisponibilite" class="form-control" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="pagination-container">
                                {{ $demandes->links('pagination::bootstrap-4') }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

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

    <script>
        $(document).ready(function() {
            var table = $('#demandesTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    }
                ]
            });

            table.buttons().container().appendTo('#demandesTable_wrapper .col-md-6:eq(0)');
            
            // Ajout de la fonctionnalité de recherche pour toutes les colonnes
            $('#demandesTable thead th').each(function() {
                var title = $(this).text();
                $(this).html(title + '<input type="text" class="form-control form-control-sm" placeholder="Rechercher ' + title + '" />');
            });

            // Appliquer la recherche
            table.columns().every(function() {
                var that = this;

                $('input', this.header()).on('keyup change clear', function() {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
        });
    </script>
</body>
</html>
