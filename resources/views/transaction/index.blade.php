@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Main</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Data Transaksi</span>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Data Transaksi</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Semua data Transaksi</a></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Kode Transaksi</th>
                                        <th class="wd-15p border-bottom-0">Nama Owner</th>
                                        <th class="wd-15p border-bottom-0">Nama Pasien</th>
                                        <th class="wd-15p border-bottom-0">Staus</th>
                                        <th class="wd-15p border-bottom-0">Tanggal Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $item)
                                        <tr>
                                            <td>
                                                <a
                                                    href="/dashboard/transactions/{{ $item->id }}">{{ $item->code }}</a>
                                            </td>
                                            <td>
                                                {{ $item->inpatient->medicalRecord->registration->patient->user->name }}
                                            </td>
                                            <td>{{ $item->inpatient->medicalRecord->registration->patient->name }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ Helper::waktu($item->created_at) }}</td>
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
