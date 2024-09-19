<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Bienvenue sur INStaD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
