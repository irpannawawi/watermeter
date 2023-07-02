@extends('layouts.app')
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Pemakaian air pelanggan</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to HPW05 Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    @if (session('success'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ session('success') }}</p>
    @endif
    <div class="row">
        <div class="card border-top">
            <div class="card-header">
                <h5 class="float-start">Pemakaian air pelanggan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>User ID</th>
                                <th>Email</th>
                                <th>Jumlah pemakaian</th>
                                <th>Jumlah Tagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($pelanggan as $p)
                                <tr>
                                    <td>{{ $n++ }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->log->sum('pemakaian_air') }}</td>
                                    <td>Rp. {{ number_format($p->log->sum('pemakaian_air')*2000, 0,0,'.') }},-</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@endsection

