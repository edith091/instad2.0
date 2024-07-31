<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Forget Password</title>
    <link rel="icon" href="build/img/instad1.PNG" type="image/png">
    <link rel="stylesheet" href="{{ asset('build/css/bootstrap1.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/css/style1.css') }}" />
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
            width: 150px;
            height: auto;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-control-lg {
            height: calc(2.875rem + 2px);
            font-size: 1.125rem;
        }

        .auth-form-btn {
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
                            <h4 class="text-center">Mot de passe oublié</h4>
                            <h6 class="text-center fw-light mb-4">Entrez votre email pour réinitialiser votre mot de passe.</h6>
                            <form action="{{ route('admin_forget_password_submit') }}" method="post" class="pt-3">
                                @csrf
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-email"></i></div>
                                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">Soumettre</button>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="{{ route('admin_login') }}" class="text-primary">Retour à la connexion</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script src="{{ asset('build/js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ asset('build/js/popper1.min.js') }}"></script>
    <script src="{{ asset('build/js/bootstrap1.min.js') }}"></script>
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>

</html>
