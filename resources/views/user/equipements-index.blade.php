@extends('layouts.partials.frontends.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <h6 class="col my-auto">Liste des Équipements Déclarés </h6>
                <form action="{{ route('user.equipements-index') }}" class="col my-auto" method="GET">
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
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-sm" scope="col">N°</th>
                        <th class="text-sm" scope="col">Nom</th>
                        <th class="text-sm" scope="col">Codification</th>
                        <th class="text-sm" scope="col">État</th>
                        <th class="text-sm" scope="col">Date d'Acquisition</th>
                        <th class="text-sm" scope="col">Type d'Équipement</th>
                        <th class="text-sm" scope="col">Actions</th>
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
                            <td>{{ $equipement->type_nom ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('equipement.edit', $equipement->id) }}" class="btn btn-xs btn-primary">Modifier</a>
                                <button type="button" class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $equipement->id }}">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="mb-3">
                    @if ($equipements->previousPageUrl())
                        <a href="{{ $equipements->appends(request()->input())->previousPageUrl() }}" class="btn btn-sm btn-success"> <i class="fas fa-left-long"></i></a>
                    @else
                        <button class="btn btn" disabled><i class="fas fa-left-long"></i></button>
                    @endif
                    @if ($equipements->nextPageUrl())
                      <a href="{{ $equipements->appends(request()->input())->nextPageUrl() }}" class="btn btn-sm btn-success"><i class="fas fa-right-long"></i></a>
                    @else
                        <button class="btn btn" disabled><i class="fas fa-right-long"></i></button>
                    @endif
                </tfoot>
           </table>
        </div>
    </div>
@endsection
