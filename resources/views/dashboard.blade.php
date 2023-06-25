@extends('layouts.app')
@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Dashboard</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Welcome to HPW05 Dashboard</li>
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
                    <div class="col-lg-7">
                        <div>
                            <div id="chart-with-area" class="ct-chart earning ct-golden-section">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <p class="text-muted mb-4">Bulan ini</p>
                                    <h3>{{$penggunaan[0]->debit_air}} L</h3>
                                    <p class="text-muted mb-5">Penggunaan air anda bulan ini.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <p class="text-muted mb-4">Bulan lalu</p>
                                    <h3>{{$penggunaan_lalu[0]->debit_air}} L</h3>
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
                        <div class="col-md-6">
                            <div>
                                <p class="text-muted">Debit Air</p>
                                <h5 class="mb-4">1,542</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wid-peity mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <p class="text-muted">Volume Air</p>
                                <h5 class="mb-4">6,451</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <p class="text-muted">Marketing</p>
                                <h5>84,574</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
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

    <!-- Plugin Js-->
    <script src="assets/libs/chartist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

    <script>
        var data = {
        // A labels array that can contain any sort of values
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'],
        // Our series array that contains series objects or in this case series data arrays
        series: [
            [400, 200, 453, 223, 321, 123,333]
        ]
        };

        Chartist.Line('.ct-chart', data, {showArea:true});
    </script>
@endsection
