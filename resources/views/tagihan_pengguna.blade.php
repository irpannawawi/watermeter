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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-4 float-start">Riwayat tagihan</h4>
                @if(Auth::user()->role == 'admin')
                <a class="btn btn-primary btn-sm float-end" href="{{route('generate-tagihan')}}">Generate tagihan</a>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    @if(Auth::user()->role == 'admin')
                                    <td>Nama</td>
                                    <td>User ID</td>
                                    @endif
                                    <th>Bulan</th>
                                    <th>Jumlah</th>
                                    <th>Status tagihan</th>

                                    @if(Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $n=1;
                                @endphp
                                @foreach ($tagihan_lalu as $tg)
                                    
                                <tr>
                                    <td>{{$n++}}</td>
                                    @if(Auth::user()->role == 'admin')
                                    <td>{{$tg->user->name}}</td>
                                    <td>{{$tg->user->id}}</td>
                                    @endif
                                    <td>{{$tg->bulan}}</td>
                                    <td>Rp. {{number_format($tg->jumlah_tagihan, 0,0)}},- </td>
                                    <td>
                                        @if ($tg->status_pembayaran == 'belum')
                                        <span class="badge rounded-pill bg-danger">Belum dibayar</span>
                                        @else   
                                        <span class="badge rounded-pill bg-success">Terbayarkan</span>
                                        @endif
                                    </td>
                                    
                                    @if(Auth::user()->role == 'admin')
                                    <td>
                                        @if($tg->status != 'belum')
                                        <a class="btn btn-success" onclick="return confirm('Bayar tagihan?')" href="{{route('bayar-tagihan', ['id'=>$tg->id])}}">Bayar</a>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
@endsection
