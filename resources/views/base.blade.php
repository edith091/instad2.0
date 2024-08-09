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

    @yield('style')
</head>

<body>
     @yield('content')

    <!-- Ajoutez ici vos scripts JavaScript -->
    <script src="{{ asset('build/js/jquery1-3.4.1.min.js') }}"></script>
    <!-- ... autres scripts ... -->
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>

</html>
