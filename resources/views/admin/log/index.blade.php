@extends('layouts.app')
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Log input</h6>
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
                <h5 class="float-start">Log input device</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Jumlah pemakaian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $n++ }}</td>
                                    <td>{{ $log->created_at }}</td>
                                    <td>{{ $log->user->name }}</td>
                                    <td>{{ $log->pemakaian_air }} Liter/menit</td>
                                    <td>{{ $log->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- add Modals --}}

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" autocomplete="off">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="example@domain.com" name="email"
                                autocomplete="off">
                        </div>

                        <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="admin">ADMIN</option>
                                <option value="pengguna">PENGGUNA</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Tambah data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.update') }}">
                        @csrf
                        @method('put')
                        <div class="form-group mb-2">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="editName" autocomplete="off">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="editEmail" placeholder="example@domain.com" name="email"
                                autocomplete="off">
                        </div>

                        <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="admin">ADMIN</option>
                                <option value="pengguna">PENGGUNA</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    
@endsection

