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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        /* Style pour les en-têtes de table */
        table thead th {
            background-color: #0d6efd; /* Bleu pour les en-têtes */
            color: white; /* Texte blanc pour un bon contraste */
            padding: 10px; /* Espacement interne */
            text-align: center; /* Alignement du texte */
        }

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
        @include('layouts.partials_admin.navbar')
        @include('layouts.partials_admin.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Liste des Équipements Déclarés</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card table-container">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="equipementsTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Nom de l'Équipement</th>
                                                    <th>Codification</th>
                                                    <th>État</th>
                                                    <th>Date d'Acquisition</th>
                                                    <th>Type d'Équipement</th>
                                                    <th>Utilisateur</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($equipements as $index => $equipement)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $equipement->nomM }}</td>
                                                    <td>{{ $equipement->codification }}</td>
                                                    <td>{{ $equipement->etat }}</td>
                                                    <td>{{ $equipement->date_acquisition }}</td>
                                                    <td>{{ $equipement->type_nom }}</td>
                                                    <td>{{ $equipement->user_nom }} {{ $equipement->user_prenom }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Actions">
                                                            <a href="{{ route('equipement.editer', $equipement->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                                            <form action="{{ route('equipement.supprimer', $equipement->id) }}" method="POST" style="display: inline;" class="delete-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $equipement->id }}">Détails</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $equipements->links() }} <!-- Pagination -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Modals -->
        @foreach($equipements as $equipement)
        <!-- Modal -->
        <div class="modal fade" id="detailsModal{{ $equipement->id }}" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailsModalLabel">Détails de l'Équipement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($equipement->carac_id)
                        <ul>
                            @if ($equipement->marque)
                            <li>Marque: {{ $equipement->marque }}</li>
                            @endif
                            @if ($equipement->modele)
                            <li>Modèle: {{ $equipement->modele }}</li>
                            @endif
                            @if ($equipement->processor)
                            <li>Processeur: {{ $equipement->processor }}</li>
                            @endif
                            @if ($equipement->ram)
                            <li>RAM: {{ $equipement->ram }}</li>
                            @endif
                            @if ($equipement->storage)
                            <li>Stockage: {{ $equipement->storage }}</li>
                            @endif
                            @if ($equipement->os)
                            <li>OS: {{ $equipement->os }}</li>
                            @endif
                            @if ($equipement->ecran)
                            <li>Écran: {{ $equipement->ecran }}</li>
                            @endif
                            @if ($equipement->gpu)
                            <li>GPU: {{ $equipement->gpu }}</li>
                            @endif
                            @if ($equipement->printer_type)
                            <li>Type d'imprimante: {{ $equipement->printer_type }}</li>
                            @endif
                            @if ($equipement->print_speed)
                            <li>Vitesse d'impression: {{ $equipement->print_speed }}</li>
                            @endif
                            @if ($equipement->scanner_type)
                            <li>Type de scanner: {{ $equipement->scanner_type }}</li>
                            @endif
                            @if ($equipement->resolution)
                            <li>Résolution: {{ $equipement->resolution }}</li>
                            @endif
                            @if ($equipement->other_type)
                            <li>Type autre: {{ $equipement->other_type }}</li>
                            @endif
                            @if ($equipement->details)
                            <li>Détails: {{ $equipement->details }}</li>
                            @endif
                        </ul>
                        @else
                        <p>Aucune caractéristique définie pour cet équipement.</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <footer class="footer text-center">
            Tous droits réservés à <a href="https://www.example.com">example.com</a>.
        </footer>

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Bootstrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- AdminLTE -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>

        <!-- DataTables & Plugins -->
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
                $('#equipementsTable').DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    buttons: [
                        {
                            extend: 'copy',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'csv',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        'colvis'
                    ]
                }).buttons().container().appendTo('#equipementsTable_wrapper .col-md-6:eq(0)');
            });
        
            $(document).on('submit', '.delete-form', function() {
                return confirm('Êtes-vous sûr de vouloir supprimer cet équipement?');
            });
        </script>
        
    </div>
</body>

</html>
