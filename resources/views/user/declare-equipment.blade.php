@extends('layouts.partials.frontends.app')
@section('content')
    <div class="card shadow my-2">
        <h1 class="card-header">Formulaire de déclaration d'équipement</h1>
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
@endsection