<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Connexion</title>
    <link rel="icon" href="build/img/instad1.PNG" type="image/png">

    <link rel="stylesheet" href="{{ asset('build/css/bootstrap1.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/niceselect/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/owl_carousel/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/gijgo/gijgo.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/tagsinput/tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/datepicker/date-picker.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/scroll/scrollable.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/datatable/css/buttons.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/text_editor/summernote-bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/morris/morris.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/vendors/material_icon/material-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/css/metisMenu.css') }}" />
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
                            <h4 class="text-center">Bienvenue de retour !</h4>
                            <h6 class="text-center fw-light mb-4">Connectez-vous pour continuer.</h6>
                            <form method="POST" action="{{ route('admin_login_submit') }}" class="pt-3">
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
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti-lock"></i></div>
                                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Mot de passe" required>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">Se connecter</button>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="{{ route('admin_forget_password') }}" class="text-primary">Mot de passe oublié?</a>
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
    <script src="{{ asset('build/js/metisMenu.js') }}"></script>
    <script src="{{ asset('build/vendors/count_up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('build/vendors/chartlist/Chart.min.js') }}"></script>
    <script src="{{ asset('build/vendors/count_up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('build/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('build/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('build/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('build/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('build/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/vendors/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/js/chart.min.js') }}"></script>
    <script src="{{ asset('build/vendors/progressbar/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('build/vendors/tagsinput/tagsinput.js') }}"></script>
    <script src="{{ asset('build/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ asset('build/vendors/am_chart/amcharts.js') }}"></script>
    <script src="{{ asset('build/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('build/vendors/scroll/scrollable-custom.js') }}"></script>
    <script src="{{ asset('build/vendors/chart_am/core.js') }}"></script>
    <script src="{{ asset('build/vendors/chart_am/charts.js') }}"></script>
    <script src="{{ asset('build/vendors/chart_am/animated.js') }}"></script>
    <script src="{{ asset('build/vendors/chart_am/kelly.js') }}"></script>
    <script src="{{ asset('build/vendors/chart_am/chart-custom.js') }}"></script>
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>

</html>
