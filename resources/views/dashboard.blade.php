@extends('layouts.app')
@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Dashboard</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Welcome to HPW05 Dashboard{{$peringatan}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Aktivitas</h4>
                <div class="row">
                    @if (strtolower($peringatan) != 'baik')
                    <div class="col">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Peringatan!</strong> {{$peringatan}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div>
                            <div style="width: 100%;"><canvas id="chart"></canvas></div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <p class="text-muted mb-4">Bulan ini</p>
                                    <h3>{{$penggunaan}} L</h3>
                                    <p class="text-muted mb-5">Penggunaan air anda bulan ini.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <p class="text-muted mb-4">Tagihan bulan ini</p>
                                    <h4>Rp. {{number_format($penggunaan*2000, 0,0)}},-</h4>
                                    <p class="text-muted mb-5">Penggunaan air anda bulan lalu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end card -->
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="card-title mb-4">Data Penggunaan</h4>
                </div>
                <div class="wid-peity mb-4">
                    <div class="row">
                        <div class="col-md-9">
                            <div>
                                <p class="text-muted">Volume Air</p>
                                <h5 class="mb-4">{{$debit_terakhir}} Liter</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="wid-peity mb-4">
                    <div class="row">
                        <div class="col-md-9">
                            <div>
                                <p class="text-muted">Debit Air</p>
                                <b class="mb-4">n/a Liter/detik</b>
                            </div>
                        </div>
                    </div>
                </div>
            -->
                <div class="">
                    <div class="row">
                        <div class="col-md-9">
                            <div>
                                <p class="text-muted">Penggunaan bulan lalu</p>
                                <h5>{{$penggunaan_lalu}} Liter</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <!-- Peity chart-->
    <script src="assets/libs/peity/jquery.peity.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        url = '{{route('get_grafik')}}'
        let dataset;
        $.get(url, {}, function(data){
            // data = JSON.parse(data)
        })
        dataset = <?=json_encode($logs['series'])?>

        label = <?=json_encode($logs['labels'])?>

        ctx = document.getElementById('chart')
        new Chart(ctx, {
            type: 'line',
            data: {
            labels: label,
            datasets: [{
                data: dataset,
                borderWidth: 3
            }]
            },
            options: {
                responsive: true,
                fill: 'start',
                title: {
                    display: false,
                }
            },
        });
        
    </script>
@endsection
