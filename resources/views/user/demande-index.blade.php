@extends('layouts.partials.frontends.app')

@section('content')
    <div class="card shadow mt-3">
        <div class="card-header row">
            <div class="col-9">
                <h4 class="">Liste des demandes</h4>
            </div>
            <div class="col">
                <select name="Action" id="" class="btn btn-outline-primary">
                    <option value="NONE" disabled selected>Action</option>
                    <option value="NONE">Importer</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            <table id="demandesTable" class="table-striped table table-bordered table-hover">
                <thead class="striped">
                    <tr>
                        <th class="text-sm" scope="col">#</th>
                        <th class="text-sm">Utilisateur</th>
                        <th class="text-sm">Équipement</th>
                        <th class="text-sm">Description</th>
                        <th class="text-sm">Date de la demande</th>
                        <th class="text-sm">Priorité</th>
                        <th class="text-sm">Statut</th>
                        <th class="text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demandes as $demande)
                        <tr>
                            <td>DEM00{{ $loop->index + 1 }}</td>
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
                                    <i class="fas fa-edit text-white"></i>
                                </a>
                                <a href="{{ route('demandes.rapport', $demande->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-file-alt text-white"></i>
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
                <tfoot class="mb-3">
                    @if ($demandes->previousPageUrl())
                        <a href="{{ $demandes->appends(request()->input())->previousPageUrl() }}" class="btn btn-sm btn-success"><i class="fas fa-left-long"></i></a>
                    @else
                        <button class="btn btn" disabled><i class="fas fa-left-long"></i></button>
                    @endif
                    @if ($demandes->nextPageUrl())
                        <a href="{{ $demandes->appends(request()->input())->nextPageUrl() }}" class="btn btn-sm btn-success"><i class="fas fa-right-long"></i></a>
                    @else
                        <button class="btn btn" disabled><i class="fas fa-right-long"></i></button>
                    @endif
                </tfoot>
            </table>
        </div>
    </div>
@endsection
