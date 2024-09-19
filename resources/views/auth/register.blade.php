<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Register</title>
    <link rel="icon" href="{{ asset('build/img/instad1.PNG') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('build/css/bootstrap1.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/css/colors/default.css') }}" id="colorSkinCSS">
    <style>
        .screan {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 1px;
            margin-bottom: 1px;
        }

        @media (min-width: 992px) {
            .screan {
                margin-top: 7rem;
                margin-bottom: 7rem;
            }
        }

        .form-container {
            max-width: 600px;
            width: 100%;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>

<body>
    <div class="screan shadow-lg container rounded text-center">
        <img src="{{ asset('build/img/instad1.png') }}" style="height:50px" alt="logo">
        <h6 class="text-center">Nouveau ici ?</h6>
        <p class="text-center fw-light mb-4">S'inscrire est facile. Cela ne prend que quelques étapes</p>
        <div class="form-container">
            <form action="" method="post">
                @csrf
                <!-- Nom -->
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-user"></i></div>
                        <input type="text" class="form-control form-control-lg" id="nom" name="nom" placeholder="Nom" required autofocus>
                    </div>
                </div>

                <!-- Prénom -->
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-user"></i></div>
                        <input type="text" class="form-control form-control-lg" id="prenom" name="prenom" placeholder="Prénom" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-email"></i></div>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>

                <!-- Bureau -->
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-location-pin"></i></div>
                        <input type="text" class="form-control form-control-lg" id="bureau" name="bureau" placeholder="Bureau" required>
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-lock"></i></div>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Mot de passe" required>
                    </div>
                </div>

                <!-- Confirmer le mot de passe -->
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-lock"></i></div>
                        <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                    </div>
                </div>

                <!-- Rôle -->
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-briefcase"></i></div>
                        <input type="text" class="form-control form-control-lg" id="role" name="role" value="user" readonly>
                    </div>
                </div>

                <!-- Direction -->
                <div class="form-group mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-direction-alt"></i></div>
                        <select class="form-select form-select-lg" id="idDirection" name="idDirection" required>
                            <option value="">Sélectionner une direction</option>
                            @foreach ($directions as $direction)
                                <option value="{{ $direction->idDirection }}">{{ $direction->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">S'inscrire</button>
                    <p class="text-xs text-muted mt-3">Déjà enregistré? <a href="{{ route('login') }}" class="text-primary">Se connecter</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('build/js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ asset('build/js/popper1.min.js') }}"></script>
    <script src="{{ asset('build/js/bootstrap1.min.js') }}"></script>
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>

</html>
