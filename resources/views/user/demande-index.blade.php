<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des demandes | INStaD</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.1.0-beta.1/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .table-container {
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
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
        @include('layouts.partials_user.navbar')
        @include('layouts.partials_user.sidebar')
        <div class="content-wrapper">
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
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card table-container">
                        <div class="card-body">
                            <table id="demandesTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Numéro</th>
                                        <th>Utilisateur</th>
                                        <th>Équipement</th>
                                        <th>Description</th>
                                        <th>Date de la demande</th>
                                        <th>Priorité</th>
                                        <th>Statut</th>
                                        <th class="no-export">Actions</th> <!-- Add class here -->
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
                                                    @default
                                                        <span class="badge badge-secondary">{{ $demande->statut }}</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                <a href="{{ route('demandes.edit', $demande->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                {{ $demandes->links() }}
                            </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.36/build/pdfmake.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.36/build/vfs_fonts.js"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTable with column search functionality
            $('#demandesTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "dom": 'Bfrtip',
                "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible:not(.no-export)' // Exclude .no-export columns
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible:not(.no-export)' // Exclude .no-export columns
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible:not(.no-export)' // Exclude .no-export columns
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible:not(.no-export)' // Exclude .no-export columns
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.no-export)' // Exclude .no-export columns
                        }
                    },
                    'colvis'
                ],
                "initComplete": function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var header = $(column.header());
                        var input = $('<input type="text" class="form-control" placeholder="Rechercher...">')
                            .appendTo(header)
                            .on('keyup change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                    });
                }
            });
        });
    </script>
</body>
</html>
