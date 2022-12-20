@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Pendaftaran</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Data Pendaftaran</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pe-1 mb-xl-0">
                    <a href="/dashboard/registrations/create" class="btn btn-primary">
                        <i class="mdi mdi-plus me-2"></i>
                        Tambah Pendaftaran
                    </a>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Data Pendaftaran</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Semua data pendaftaran</a></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Nomor Antrian</th>
                                        <th class="wd-15p border-bottom-0">Nama Dokter</th>
                                        <th class="wd-15p border-bottom-0">Nama Owner</th>
                                        <th class="wd-20p border-bottom-0">Pasien</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registration as $item)
                                        <tr>
                                            <td>{{ $item->urutan }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->patient->user->name }}</td>
                                            <td>{{ $item->patient->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
