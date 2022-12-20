@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Dokter</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Data Dokter</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pe-1 mb-xl-0">
                    <a href="/dashboard/users/create" class="btn btn-primary">
                        <i class="mdi mdi-plus me-2"></i>
                        Tambah Dokter
                    </a>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Data Dokter</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Semua data dokter</a></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Avatar</th>
                                        <th class="wd-15p border-bottom-0">Nama Lengkap</th>
                                        <th class="wd-15p border-bottom-0">Email</th>
                                        <th class="wd-20p border-bottom-0">No HP</th>
                                        <th class="wd-10p border-bottom-0">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>
                                                <div
                                                    style="width: 30px; height: 30px; border-radius: 50%; position: relative;">
                                                    <img src="{{ asset('upload/' . $item->avatar) }}"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                </div>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td class="d-flex">
                                                <a onclick='modal_konfir("/dashboard/users/{{ $item->id }}")'
                                                    href="#" class="btn m-auto btn-danger btn-icon">
                                                    <i class="typcn typcn-trash"></i>
                                                </a>
                                            </td>
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
