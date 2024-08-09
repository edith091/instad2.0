@extends('layouts.partials.frontends.app')
@section('content')
    <div class="card container shadow my-5 mt-8">
        <h1 class="card-title text-uppercase py-2 px-2" style="font-weight:bolder">Modifier la demande</h1>
        <div class="card-body">
            <form action="{{ route('demandes.update', $demande->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="equipement_id">Codification</label>
                    <select class="form-control select2" id="equipement_id" name="equipement_id" style="width: 100%;">
                        @foreach($equipements as $equipement)
                            <option value="{{ $equipement->id }}" {{ $demande->equipement_id == $equipement->id ? 'selected' : '' }}>
                               {{ $equipement->nomM }}  ----{{ $equipement->codification }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $demande->description }}</textarea>
                        </div>
                    <div class="form-group">
                       <label for="date_demande">Date de la demande</label>
                        <input type="date" class="form-control" id="date_demande" name="date_demande" value="{{$demande->date_demande}}" required>
                    </div>
                    <div class="form-group">
                        <label for="priorite">Priorité</label>
                        <select class="form-control" id="priorite" name="priorite">
                            <option value="gênant" {{ $demande->priorite == 'gênant' ? 'selected' : '' }}>gênant</option>
                            <option value="bloquant" {{ $demande->priorite == 'bloquant' ? 'selected' : '' }}>bloquant</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <a href="{{ route('demandes.index') }}" class="btn btn-danger w-100"><i class="fas fa-times"></i> Annuler</a>
                        </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
