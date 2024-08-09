@extends('base')
@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 30rem;">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('build/img/instad1.png') }}" alt="logo" class="img-fluid">
                </div>
                <h4 class="card-title text-center">Bienvenue sur la Plateforme de Maintenance INStaD</h4>
                <h6 class="card-subtitle text-center text-muted mb-4">Votre outil dédié à la gestion et au suivi des équipements informatiques.</h6>
                <p class="card-text text-center">Connectez-vous pour commencer à utiliser la plateforme et optimiser la maintenance de vos équipements.</p>
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2">Connexion</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary mx-2">Inscription</a>
                </div>
            </div>
        </div>
    </div>
@endsection
