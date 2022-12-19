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
                    <h4 class="content-title mb-0 my-auto">Owner</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Data Owner / Tambah</span>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card card-body pd-20 pd-md-40 border shadow-none">
                    <h5 class="card-title mg-b-20">Tambah Data Owner</h5>
                    <form action="/dashboard/owners" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama Lengkap</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">No Telepon</label>
                                    <input class="form-control @error('phone_number') is-invalid @enderror" type="text"
                                        name="phone_number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Profesi</label>
                                    <input class="form-control @error('profession') is-invalid @enderror" type="text"
                                        name="profession" value="{{ old('profession') }}">
                                    @error('profession')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Alamat</label>
                                    <textarea rows="4" class="form-control @error('address') is-invalid @enderror" type="text" name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Avatar</label>
                                <input type="file" id="input-file-now" name="avatar" class="dropify" />
                                @error('avatar')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-main-primary btn-block">Submit</button>
                    </form>
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
