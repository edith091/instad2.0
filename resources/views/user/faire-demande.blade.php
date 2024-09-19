@extends('layouts.partials.frontends.app')
@section('content')
    <div class="shadow container card my-3 my-lg-5">
        <h6 class="mt-2" style="font-weight:bolder; font-size:25px">Formulaire de demande</h6>
        {{-- <form method="POST" action="{{ route('declare-equipment.store') }}">
            @csrf
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <div class="row mb-2">
                <div class="col-md-12">
                   <div class="form-group">
                        <label for="user_name" class="form-label"><i class="fas fa-user"></i> Utilisateur</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-6">
                    <label for="equipement_id" class="float-label">Nom de l'équipement et codification:</label>
                    <select class="form-control" id="equipement_id" name="equipement_id">
                        @foreach($equipements as $equipement)
                            <option value="{{ $equipement->id }}">
                                {{ $equipement->nomM }} - {{ $equipement->codification }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="codification" class="form-label"><i class="fas fa-barcode"></i> Codification</label>
                        <input type="text" class="form-control" id="codification" name="codification" required>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
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
            <button type="submit" class="btn btn-primary mb-2">Déclarer équipement</button>
        </form>   --}}   
        <div class="card-body">
            <form action="{{ route('demandes.store') }}" method="POST" class="form-material">
                @csrf
                <h2>Formulaire de demande</h2>
                <div class="row">
                    <!-- Utilisateur -->
                    <div class="form-group col-md-6">
                        <label for="user" class="float-label">Utilisateur:</label>
                        <input type="text" id="user" name="user" class="form-control" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
                    </div>
                    <!-- Date de la demande -->
                    <div class="form-group col-md-6">
                        <label for="date_demande" class="float-label">Date de la demande:</label>
                        <input type="date" id="date_demande" name="date_demande" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <!-- Équipement -->
                    <div class="form-group col-md-6">
                        <label for="equipement_id" class="float-label">Nom de l'équipement et codification:</label>
                        <select class="form-control" id="equipement_id" name="equipement_id">
                            @foreach($equipements as $equipement)
                                <option value="{{ $equipement->id }}">
                                    {{ $equipement->nomM }} - {{ $equipement->codification }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Priorité -->
                    <div class="form-group col-md-6">
                        <label for="priorite" class="float-label">Priorité:</label>
                        <select class="form-control" id="priorite" name="priorite">
                            <option value="gênant">Gênant</option>
                            <option value="bloquant">Bloquant</option>
                        </select>
                    </div>
                </div>
                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="float-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <!-- Bouton de soumission -->
                <div class="form-group button-container">
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
            </form>
        </div>  
    </div>
@endsection
