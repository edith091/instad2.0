@extends('layouts.partials.frontends.app')
@section('content')
    <div class="card shadow mt-4">
        <h4 class="card-header">Modifier équipement</h4>
        <div class="card-body">
        <form method="POST" action="{{ route('equipement.update', $equipment->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="user_name" class="form-label"><i class="fas fa-user"></i> Utilisateur</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
            </div>
            <div class="row mb-3">
               <div class="col-md-6">
                    <label for="nomM" class="form-label"><i class="fas fa-laptop"></i> Nom de l'équipement</label>
                    <input type="text" class="form-control" id="nomM" name="nomM" value="{{ old('nomM', $equipment->nomM) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="codification" class="form-label"><i class="fas fa-barcode"></i> Codification</label>
                    <input type="text" class="form-control" id="codification" name="codification" value="{{ old('codification', $equipment->codification) }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="etat" class="form-label"><i class="fas fa-info-circle"></i> État</label>
                    @php
                        $declarationDate = new DateTime($equipment->created_at);
                        $currentDate = new DateTime();
                        $interval = $declarationDate->diff($currentDate);
                        $daysDifference = $interval->days;
                    @endphp
                    @if ($daysDifference <= 30)
                        <select class="form-control" id="etat" name="etat" required>
                            <option value="">Sélectionnez l'état</option>
                            <option value="Fonctionne normalement" {{ $equipment->etat === 'Fonctionne normalement' ? 'selected' : '' }}>Fonctionne normalement</option>
                            <option value="Défectueux" {{ $equipment->etat === 'Défectueux' ? 'selected' : '' }}>Défectueux</option>
                            <option value="Bug souvent" {{ $equipment->etat === 'Bug souvent' ? 'selected' : '' }}>Bug souvent</option>
                        </select>
                    @else
                        <input type="text" class="form-control" id="etat" name="etat" value="{{ $equipment->etat }}" readonly>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="date_acquisition" class="form-label"><i class="fas fa-calendar-alt"></i> Date d'acquisition</label>
                    <input type="date" class="form-control" id="date_acquisition" name="date_acquisition" value="{{ old('date_acquisition', $equipment->date_acquisition) }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="idTypeEquipement" class="form-label"><i class="fas fa-list-alt"></i> Type d'équipement</label>
                    <select id="idTypeEquipement" name="idTypeEquipement" required class="form-control">
                        <option value="">Sélectionnez le type d'équipement</option>
                        @foreach($typesEquipement as $typeEquipement)
                            <option value="{{ $typeEquipement->idTypeEquipement }}" {{ $typeEquipement->idTypeEquipement === $equipment->idTypeEquipement ? 'selected' : '' }}>{{ $typeEquipement->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Enregistrer les modifications</button>
                </div>
                <div class="col-6">
                    <a href="{{ route('user.equipements-index') }}" class="btn btn-danger w-100"><i class="fas fa-times"></i> Annuler</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
