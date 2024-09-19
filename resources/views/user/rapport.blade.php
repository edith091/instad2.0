@extends('layouts.partials.frontends.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Rapport pour la demande #{{ $demande->id }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('demandes.storeRapport', $demande->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="rapport_utilisateur">Rapport Utilisateur</label>
                        <textarea name="rapport_utilisateur" id="rapport_utilisateur" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Enregistrer le Rapport</button>
                </form>
            </div>
        </div>
    </div>
@endsection
