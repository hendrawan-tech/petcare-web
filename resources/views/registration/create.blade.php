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
                    <h5 class="card-title mg-b-20">Tambah Data Pendaftaran</h5>
                    <form action="/dashboard/registrations" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Dokter</label>
                                <select class="form-control @error('user_id') is-invalid @enderror js-example-basic-single"
                                    name="user_id">
                                    <option value="">Pilih Dokter</option>
                                    @foreach ($doctor as $item)
                                        <option value="{{ $item->id }}" {{ old('user_id') ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Pasien</label>
                                <select class="form-control @error('patient_id') is-invalid @enderror js-example-basic-single"
                                    name="patient_id">
                                    <option value="">Pilih Pasien</option>
                                    @foreach ($patient as $item)
                                        <option value="{{ $item->id }}" {{ old('patient_id') ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-main-primary mt-3 btn-block">Submit</button>
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
