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
                    <h4 class="content-title mb-0 my-auto">Pasien</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Data Pasien / Tambah</span>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card card-body pd-20 pd-md-40 border shadow-none">
                    <h5 class="card-title mg-b-20">Tambah Data Pasien</h5>
                    <form action="/dashboard/patients" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama Lengkap</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Umur</label>
                                    <input class="form-control @error('age') is-invalid @enderror" type="text"
                                        name="age" value="{{ old('age') }}">
                                    @error('age')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Jenis Kelamin</label>
                                <select class="form-control @error('gender') is-invalid @enderror select2" name="gender">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="jantan">Jantan</option>
                                    <option value="betina">Betina</option>
                                </select>
                                @error('gender')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Owner</label>
                                <select class="form-control @error('user_id') is-invalid @enderror select2" name="user_id">
                                    <option value="">Pilih Owner</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}" {{ old('user_id') ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-12">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Speies</label>
                                <select class="form-control @error('species_patient_id') is-invalid @enderror select2"
                                    name="species_patient_id">
                                    <option value="">Pilih Speies</option>
                                    @foreach ($species as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('species_patient_id') ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('species_patient_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Foto</label>
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                                @error('image')
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
