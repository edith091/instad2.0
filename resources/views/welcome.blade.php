<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Bienvenue sur INStaD</title>
    <link rel="icon" href="build/img/instad1.PNG" type="image/png">

    <!-- Ajoutez ici vos liens vers les feuilles de style Bootstrap et autres ressources -->
    <link rel="stylesheet" href="{{ asset('build/css/bootstrap1.min.css') }}" />
    <!-- ... autres liens ... -->
    <link rel="stylesheet" href="{{ asset('build/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/css/colors/default.css') }}" id="colorSkinCSS">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-scroller {
            height: 100vh;
        }

        .welcome-light {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .brand-logo img {
            width: 150px;
            height: auto;
        }

        .welcome-message {
            margin-bottom: 25px;
        }

        .welcome-btn {
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
                        <div class="welcome-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center mb-4">
                                <img src="{{ asset('build/img/instad1.png') }}" alt="logo">
                            </div>
                            <h4 class="text-center">Bienvenue sur la Plateforme de Maintenance INStaD</h4>
                            <h6 class="text-center fw-light mb-4">Votre outil dédié à la gestion et au suivi des équipements informatiques.</h6>
                            <div class="welcome-message">
                                <p class="text-center">Connectez-vous pour commencer à utiliser la plateforme et optimiser la maintenance de vos équipements.</p>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="btn btn-primary welcome-btn">Connexion</a>
                                <a href="{{ route('register') }}" class="btn btn-secondary welcome-btn">Inscription</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- Ajoutez ici vos scripts JavaScript -->
    <script src="{{ asset('build/js/jquery1-3.4.1.min.js') }}"></script>
    <!-- ... autres scripts ... -->
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>

</html>
