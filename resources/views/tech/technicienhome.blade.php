@extends('layouts.partials.frontends.tech')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$tache_totale}}</h3>
                    <p>Taches Totales</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $tache_termine }}<sup style="font-size: 20px"></sup></h3>
                    <p>Taches terminées</p>
                </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $tache_encours }}</h3>
                            <p>Taches en cours</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $tache_annule }}</h3>
                            <p>Taches annulées</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <section class="col-lg-7 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Vue D'ensemble des demandes traitées
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                  <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </section>


                <section class="col-lg-5 connectedSortable">
                    <div class="card bg-gradient-primary">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                Emplacement
                            </h3>
                
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                    <i class="far fa-calendar-alt"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                
                        <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
                            <div style="height: 100%; width: 100%; max-width: 800px; max-height: 800px; border-radius: 8px; overflow: hidden;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3217754716975!2d2.3977446746426834!3d6.352372293637525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x102354363a66a8df%3A0x60977367f0038367!2sInstitut%20National%20de%20la%20Statistique%20et%20de%20la%20D%C3%A9mographie%20(INStaD)!5e0!3m2!1sfr!2sbj!4v1725370724639!5m2!1sfr!2sbj" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                
                        <div class="card-footer bg-transparent">
                            <div class="row">
                                <div class="col-4 text-center">
                                    {{-- <div id="sparkline-1"></div>
                                    <div class="text-white">Visitors</div> --}}
                                </div>
                                <div class="col-4 text-center">
                                    {{-- <div id="sparkline-2"></div>
                                    <div class="text-white">Online</div> --}}
                                </div>
                                <div class="col-4 text-center">
                                    {{-- <div id="sparkline-3"></div>
                                    <div class="text-white">Sales</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var labels = @json($demande->pluck('nom_equipement'));
    var data = @json($demande->pluck('total_demandes'));
    var ctx = document.getElementById('revenue-chart-canvas').getContext('2d');

    var demandesChart = new Chart(ctx, {
        type: 'bar', // Utiliser 'BAR' pour une courbe
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre de taches',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                fill: true // Remplir sous la courbe
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
</script>
@endsection