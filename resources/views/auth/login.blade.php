<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .auth-form {
            max-width: 400px;
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        .brand-logo img {
            width: 150px;
            height: auto;
            display: block;
            margin: auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .auth-form-btn {
            font-size: 16px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
                <div class="auth-form">
                    <div class="brand-logo mb-4">
                        <img src={{ asset('build/img/instad1.PNG') }} alt="logo">
                    </div>
                    <h4 class="text-center mb-4">Bienvenue de retour !</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Mot de passe" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block auth-form-btn">Se connecter</button>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('password.request') }}" class="text-primary">Mot de passe oublié?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" integrity="sha384-Q6E9RHTEi5JLvWVPrxfFjqbrMH1foL9g+rVDE5fZJvGz2V8+gV2CkC8ilistuBx" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+pbh/xYsNyJ4F9qHt4ONE3Uq/2KRStKXYKS" crossorigin="anonymous"></script>
</body>
</html>
