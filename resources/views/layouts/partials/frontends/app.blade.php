<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User| Dashboard</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->






    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min2167.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

<body>
    @include('layouts.partials_user.navbar')

    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
</body>
</html>
