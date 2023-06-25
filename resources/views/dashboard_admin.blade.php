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
        
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <i class="fa fa-users"></i>
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">Pengguna</h5>
                    <h4 class="fw-medium font-size-24">{{$jumlah_pengguna}}<i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{route('users')}}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">Since last month</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

