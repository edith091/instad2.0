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
        .screan {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 1px; /* py-1 for all screen sizes */
            margin-bottom: 1px;
        }

        /* For large screens (lg and above, usually 992px and up) */
        @media (min-width: 992px) {
            .screan {
                margin-top: 7rem; /* py-lg-3 for large screens */
                margin-bottom: 7rem;
            }
        }
    </style>

</head>

<body>
    <div class="screan shadow-lg container rounded text-center">
        <img src="{{ asset('build/img/instad1.png') }}" style="height:50px" alt="logo">
        <h6 class="text-center">Nouveau ici ?</h6>
        <p class="text-center fw-light mb-4">S'inscrire est facile. Cela ne prend que quelques étapes</p>
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-user"></i></div>
                        <input type="text" class="form-control form-control-lg" id="nom" name="nom" placeholder="Nom" required autofocus>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-user"></i></div>
                        <input type="text" class="form-control form-control-lg" id="prenom" name="prenom" placeholder="Prénom" required>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-email"></i></div>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-user"></i></div>
                        <input type="text" class="form-control form-control-lg" id="bureau" name="bureau" value="user"placeholder="Bureau" required>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-lock"></i></div>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Mot de passe" required>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-lock"></i></div>
                        <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <div class="input-group">
                        <div class="input-group-text"><i class="ti-user"></i></div>
                        <input type="text" class="form-control form-control-lg" id="role" name="role" value="user" readonly>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-3">
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
                    <p class="text-xs text-muted">Déjà enregistré? <a href="{{ route('login') }}" class="text-primary">Se connecter</a></p>
                </div>
            </div>
        </form>
    </div>

    <!-- <div class="container-scroller">
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


                                <div class="text-center mt-3">
                                    Déjà enregistré? <a href="{{ route('login') }}" class="text-primary">Se connecter</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <script src="{{ asset('build/js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ asset('build/js/popper1.min.js') }}"></script>
    <script src="{{ asset('build/js/bootstrap1.min.js') }}"></script>
    <!-- Other JS files -->
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>

</html>
