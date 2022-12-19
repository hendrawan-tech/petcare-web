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
                    <h4 class="content-title mb-0 my-auto">Dokter</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Jadwal Dokter / Ubah</span>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card card-body pd-20 pd-md-40 border shadow-none">
                    <h5 class="card-title mg-b-20">Ubah Jadwal Dokter</h5>
                    <form action="/dashboard/practice-schedules/{{ $practice_schedule->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Dokter</label>
                                <select class="form-control @error('user_id') is-invalid @enderror select2" name="user_id"
                                    disabled>
                                    <option value="{{ $practice_schedule->user_id }}">{{ $practice_schedule->user->name }}
                                    </option>
                                </select>
                                @error('user_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Hari</label>
                                <select class="form-control @error('day') is-invalid @enderror select2" name="day">
                                    <option value="">Pilih Hari</option>
                                    @foreach ($days as $item)
                                        <option value="{{ $item }}"
                                            {{ $practice_schedule->day == $item ? 'selected' : '' }}>
                                            {{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('day')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-2 col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Dari Jam</label>
                                    <input class="form-control @error('start_time') is-invalid @enderror" type="text"
                                        name="start_time" value="{{ $practice_schedule->start_time }}">
                                    @error('start_time')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2 col-12">
                                <div class="form-group">
                                    <label class="main-content-label tx-11 tx-medium tx-gray-600">Sampai Jam</label>
                                    <input class="form-control @error('end_time') is-invalid @enderror" type="text"
                                        name="end_time" value="{{ $practice_schedule->end_time }}">
                                    @error('end_time')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
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
