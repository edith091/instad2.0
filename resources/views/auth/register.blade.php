<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Register</title>
    <link rel="icon" href="build/img/instad1.PNG" type="image/png">
    <link rel="stylesheet" href="{{ asset('build/css/bootstrap1.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/themefy_icon/themify-icons.css') }}" />
    <!-- Other CSS files -->
    <link rel="stylesheet" href="{{ asset('build/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/css/colors/default.css') }}" id="colorSkinCSS">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-scroller {
            height: 100vh;
        }
        .auth-form-light {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .brand-logo img {
            width: 150px; /* Adjust as needed */
            height: auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .auth-form-btn {
            font-size: 16px;
        }
        .auth-form-light h4,
        .auth-form-light h6 {
            color: #343a40;
        }
        .auth-form-light .form-control {
            border-radius: 25px;
            padding-left: 45px;
        }
        .auth-form-light .form-control:focus {
            box-shadow: none;
        }
        .auth-form-light .input-group-text {
            background-color: transparent;
            border: none;
            border-radius: 25px;
            padding: 10px;
            margin-right: -45px;
            z-index: 10;
        }
        .auth-form-light .input-group-text i {
            font-size: 18px;
            color: #adb5bd;
            width: 100%;
            text-align: center;
        }
        .auth-form-light .input-group {
            position: relative;
        }
        .auth-form-light .auth-form-btn {
            border-radius: 25px;
            margin-top: 20px;
            padding: 12px 25px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center mb-4">
                                <img src="{{ asset('build/img/instad1.png') }}" alt="logo">
                            </div>
                            <h4 class="text-center">Nouveau ici ?</h4>
                            <h6 class="text-center fw-light mb-4">S'inscrire est facile. Cela ne prend que quelques étapes</h6>
                            <form method="POST" action="{{ route('register') }}" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-user"></i></div>
                                        <input type="text" class="form-control form-control-lg" id="nom" name="nom" placeholder="Nom" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-user"></i></div>
                                        <input type="text" class="form-control form-control-lg" id="prenom" name="prenom" placeholder="Prénom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-email"></i></div>
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-user"></i></div>
                                        <input type="text" class="form-control form-control-lg" id="bureau" name="bureau" value="user"placeholder="Bureau" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-lock"></i></div>
                                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Mot de passe" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-lock"></i></div>
                                        <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-user"></i></div>
                                        <input type="text" class="form-control form-control-lg" id="role" name="role" value="user" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
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
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">S'inscrire</button>
                                </div>
                                <div class="text-center mt-3">
                                    Déjà enregistré? <a href="{{ route('login') }}" class="text-primary">Se connecter</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('build/js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ asset('build/js/popper1.min.js') }}"></script>
    <script src="{{ asset('build/js/bootstrap1.min.js') }}"></script>
    <!-- Other JS files -->
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>

</html>
