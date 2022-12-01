@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
    <style>
        .mce-notification.mce-in {
            display: none !important;
        }

        .dropify-wrapper .dropify-message p {
            font-size: 14px !important;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Pengaturan</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Profil</span>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Ubah Profil</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/dashboard/settings/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name="name" value="{{ $user->name }}">
                                        @error('name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" disabled
                                            type="text" name="email" value="{{ $user->email }}">
                                        @error('email')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Foto</label>
                                    <input type="file" id="input-file-now" name="avatar" class="dropify"
                                        data-default-file="{{ asset('upload/' . $user->avatar) }}" />
                                    @error('avatar')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-main-primary btn-block" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Ubah Password</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('password'))
                            <div class="alert alert-danger mb-2" role="alert">
                                <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Error!</strong> {{ session('password') }}
                            </div>
                        @endif
                        <form action="/dashboard/settings/password" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Password Lama</label>
                                        <input class="form-control @error('old_password') is-invalid @enderror"
                                            type="password" name="old_password">
                                        @error('old_password')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Password Baru</label>
                                        <input class="form-control @error('new_password') is-invalid @enderror"
                                            type="password" name="new_password">
                                        @error('new_password')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Konfirmasi
                                            Password</label>
                                        <input class="form-control @error('confirm_password') is-invalid @enderror"
                                            type="password" name="confirm_password">
                                        @error('confirm_password')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-main-primary btn-block" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
@endpush
