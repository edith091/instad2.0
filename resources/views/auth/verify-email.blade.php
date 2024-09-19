<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Verification</title>
    <link rel="icon" href="{{ asset('build/img/instad1.PNG') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('build/css/bootstrap1.min.css') }}" />
</head>

<body>
    <div class="container mt-5">
        <!-- Information Message -->
        <div class="alert alert-info text-center mb-4">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        <!-- Success Message -->
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success text-center mb-4">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <!-- Resend Verification Email Button -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-decoration-none text-muted">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('build/js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ asset('build/js/popper1.min.js') }}"></script>
    <script src="{{ asset('build/js/bootstrap1.min.js') }}"></script>
</body>

</html>



{{-- 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de l'Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Merci pour votre inscription !</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">
                        {{ __('Avant de commencer, pourriez-vous vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer ? Si vous n\'avez pas reçu l\'email, nous vous enverrons volontiers un autre.') }}
                    </p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success text-center">
                            {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse email que vous avez fournie lors de l\'inscription.') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">
                        <form method="POST" action="{{ route('verification.send') }}" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Renvoyer l\'email de vérification') }}
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">
                                {{ __('Se déconnecter') }}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-center text-muted">
                    <small>{{ __('Si vous avez des questions, contactez notre support.') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
