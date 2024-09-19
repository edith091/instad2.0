<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin | Dashboard</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ionicons/2.0.1/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min2167.css?v=3.2.0') }}">
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<link rel="stylesheet" href="../../dist/css/adminlte.min2167.css?v=3.2.0">
<script nonce="d9f7e1c7-1ea1-4f0f-b89f-0780ffed27a6">
    try {
        (function(w, d) {
            !function(U,V,W,X) {
                U[W]=U[W]||{};
                U[W].executed=[];
                U.zaraz={deferred:[],listeners:[]};
                U.zaraz._v="5705";
                U.zaraz.q=[];
                U.zaraz._f=function(Y) {
                    return async function() {
                        var Z=Array.prototype.slice.call(arguments);
                        U.zaraz.q.push({m:Y,a:Z})
                    }
                };
                for(const $ of["track","set","debug"])U.zaraz[$]=U.zaraz._f($);
                U.zaraz.init=()=> {
                    var ba=V.getElementsByTagName(X)[0],
                        bb=V.createElement(X),
                        bc=V.getElementsByTagName("title")[0];
                    bc&&(U[W].t=V.getElementsByTagName("title")[0].text);
                    U[W].x=Math.random();
                    U[W].w=U.screen.width;
                    U[W].h=U.screen.height;
                    U[W].j=U.innerHeight;
                    U[W].e=U.innerWidth;
                    U[W].l=U.location.href;
                    U[W].r=V.referrer;
                    U[W].k=U.screen.colorDepth;
                    U[W].n=V.characterSet;
                    U[W].o=(new Date).getTimezoneOffset();
                    if(U.dataLayer)for(const bg of Object.entries(Object.entries(dataLayer).reduce(((bh,bi)=>({...bh[1],...bi[1]})),{})))zaraz.set(bg[0],bg[1],{scope:"page"});
                    U[W].q=[];
                    for(;U.zaraz.q.length;) {
                        const bj=U.zaraz.q.shift();
                        U[W].q.push(bj)
                    }
                    bb.defer=!0;
                    for(const bk of[localStorage,sessionStorage])Object.keys(bk||{}).filter((bm=>bm.startsWith("_zaraz_"))).forEach((bl=> {
                        try {
                            U[W]["z_"+bl.slice(7)]=JSON.parse(bk.getItem(bl))
                        } catch {
                            U[W]["z_"+bl.slice(7)]=bk.getItem(bl)
                        }
                    }
                    ));
                    bb.referrerPolicy="origin";
                    bb.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(U[W])));ba.parentNode.insertBefore(bb,ba)
                };
                ["complete","interactive"].includes(V.readyState)?zaraz.init():U.addEventListener("DOMContentLoaded",zaraz.init)
            }
            (w,d,"zarazData","script")
        }
        (window,document)
        )
    }
    catch(e) {
        throw fetch("/cdn-cgi/zaraz/t"),e
    }
    ;
</script>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" src=" {{ asset('build/img/instad1.png') }}" alt="INStaD-BENIN" height="60" width="60">
</div>
@include('layouts.partials_admin.navbar')

<div class="content-wrapper">
@include('layouts.partials_admin.sidebar')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Dashboard</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Dashboard v1</li>
</ol>
</div>
</div>
</div>
</div>


<!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Nombres Total d'utilisateurs -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalUsers }}</h3>
                                <p>Nombres Total d'utilisateurs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Tasks Affected -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalTachesAffectees }}</h3>
                                <p>Tâches affectées</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Tasks Reassigned -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $totalReaffectations }}</h3>
                                <p>Tâches réassignées</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-refresh"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Tasks In Progress -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $totalTachesEnCours }}</h3>
                                <p>Tâches Traitées</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-time"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Existing content here -->
                        </div>

                        <!-- New section for the chart -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Dashboard Summary</h3>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="dashboardChart" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 100%; width: 100%; max-width: 800px; max-height: 800px; border-radius: 8px; overflow: hidden;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3217754716975!2d2.3977446746426834!3d6.352372293637525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x102354363a66a8df%3A0x60977367f0038367!2sInstitut%20National%20de%20la%20Statistique%20et%20de%20la%20D%C3%A9mographie%20(INStaD)!5e0!3m2!1sfr!2sbj!4v1725370724639!5m2!1sfr!2sbj" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                </div>


</div>

<footer class="main-footer">
<strong>Copyright &copy; 2024-2025 <a href="https://adminlte.io/">InstAD.bj</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
<b>Version</b> 3.2.0
</div>
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>

<!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte2167.js?v=3.2.0') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
      <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('dashboardChart').getContext('2d');
        var dashboardChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Users', 'Tâches Affectées', 'Tâches Réaffectées', 'Tâches en Cours', 'Tâches Terminées'],
                datasets: [{
                    label: 'Statistics Overview',
                    data: [{{ $totalUsers }}, {{ $totalTachesAffectees }}, {{ $totalReaffectations }}, {{ $totalTachesEnCours }}, {{ $totalTachesTerminees }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

</body>
</html>
