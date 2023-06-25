@extends('layouts.app')
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Pengguna</h6>
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
                <h5 class="float-start">Edit Pengguna</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.update') }}">
                    @csrf
                    @method('put')
                    <div class="form-group mb-2">
                        <label for="name">Nama</label>
                        <input type="text" value="{{$user->name}}" class="form-control" name="name" id="editName" autocomplete="off" required>
                        <input type="hidden" value="{{$user->id}}" name="id"  required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="editEmail" placeholder="example@domain.com" name="email"
                            autocomplete="off" value="{{$user->email}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option {{$user->role=='admin'?'selected':''}} value="admin">ADMIN</option>
                            <option {{$user->role=='pengguna'?'selected':''}} value="pengguna">PENGGUNA</option>
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                        <small>Kosongkan jika tidak akan merubah password</small>
                    </div>
                    <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>

@endsection

