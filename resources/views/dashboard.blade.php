@extends('layouts.partials.frontends.app')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$totalDemande}}</h3>
                    <p>Demandes Total</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                            <h3>{{ $demande_termine }}<sup style="font-size: 20px"></sup></h3>
                            <p>Demandes terminées</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $demande_affecte }}</h3>
                            <p>Demandes en cours</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $demande_annule }}</h3>
                            <p>Demandes annulées</p>
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

                    {{-- <div class="card direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">Avis Clients</h3>
                            <div class="card-tools">
                                <span title="3 New Messages" class="badge badge-primary">3</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="direct-chat-messages">

                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>

                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

                                    <div class="direct-chat-text">
                                        Is this template really for free? That's unbelievable!
                                    </div>

                                </div>


                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                    </div>

                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">

                                    <div class="direct-chat-text">
                                        You better believe it!
                                    </div>

                                </div>


                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                    </div>

                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">

                                    <div class="direct-chat-text">
                                        Working with AdminLTE on a great new app! Wanna join?
                                    </div>

                                </div>


                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                    </div>

                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">

                                    <div class="direct-chat-text">
                                        I would love to.
                                    </div>

                                </div>
                            </div>


                            <div class="direct-chat-contacts">

                            </div>

                        </div>

                        <div class="card-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>

                    </div> --}}
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
                    label: 'Nombre de demandes par équipement',
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