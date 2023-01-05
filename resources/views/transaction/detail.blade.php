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
            <div class="col-md-12 col-xl-12">
                <div class=" main-content-body-invoice">
                    <div class="card card-invoice">
                        <div class="card-body">
                            <div class="invoice-header">
                                <h1 class="invoice-title">Invoice</h1>
                                <div class="billed-from">
                                    <h6>Bontang Petcare</h6>
                                    <p>Jl gunung bawang no 23 BSD Bontang kaltim 75311.<br>
                                        Nomor Telepon: +62 811-5416-644<br>
                                        Email: bontang-petcare@gamail.com</p>
                                </div><!-- billed-from -->
                            </div><!-- invoice-header -->
                            <div class="row mg-t-20">
                                <div class="col-md">
                                    <label class="tx-gray-600">Billed To</label>
                                    <div class="billed-to">
                                        <h6>{{ $transaction->inpatient->medicalRecord->registration->patient->user->name }}
                                        </h6>
                                        <p>{{ $transaction->inpatient->medicalRecord->registration->patient->user->address }}<br>
                                            No Telepon:
                                            {{ $transaction->inpatient->medicalRecord->registration->patient->user->phone_number }}<br>
                                            Email:
                                            {{ $transaction->inpatient->medicalRecord->registration->patient->user->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <label class="tx-gray-600">Invoice Information</label>
                                    <p class="invoice-info-row"><span>Nomor Transaksi</span>
                                        <span>{{ $transaction->code }}</span>
                                    </p>
                                    <p class="invoice-info-row"><span>Tanggal Transaksi:</span>
                                        <span>{{ Helper::waktu($transaction->created_at) }}</span>
                                    </p>
                                    <p class="invoice-info-row"><span>Status:</span>
                                        <span>{{ $transaction->status }}</span>
                                    </p>
                                </div>
                            </div>
                            @if (count($transaction->medicalPrescription) > 0)
                                <div class="table-responsive mg-t-40">
                                    <h5 class="mb-4">Resep Obat</h5>
                                    <table class="table table-invoice border text-md-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="wd-20p">Description</th>
                                                <th class="wd-40p">Jumlah</th>
                                                <th class="tx-right">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->medicalPrescription as $item)
                                                <tr>
                                                    <td>{{ $item->description }}</td>
                                                    <td class="tx-12">{{ $item->quantity }}</td>
                                                    <td></td>
                                                    <td class="tx-right">{{ Helper::price($item->price) }}</td>
                                                </tr>
                                            @endforeach
                                            {{-- <tr>
                                                <td class="valign-middle" colspan="2" rowspan="4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tx-right tx-uppercase tx-bold tx-inverse">Total</td>
                                                <td class="tx-right" colspan="2">
                                                    <h4 class="tx-primary tx-bold">{{ Helper::price($transaction->total) }}
                                                    </h4>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            @if (count($transaction->treatment) > 0)
                                <div class="table-responsive mg-t-40">
                                    <h5 class="mb-4">Perawatan</h5>
                                    <table class="table table-invoice border text-md-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="wd-20p">Deskripsi</th>
                                                <th class="wd-40p"></th>
                                                <th class="tx-right">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->treatment as $item)
                                                <tr>
                                                    <td>{{ $item->description }}</td>
                                                    <td class="tx-12"></td>
                                                    <td></td>
                                                    <td class="tx-right">{{ Helper::price($item->price) }}</td>
                                                </tr>
                                            @endforeach
                                            {{-- <tr>
                                                <td class="valign-middle" colspan="2" rowspan="4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tx-right tx-uppercase tx-bold tx-inverse">Total</td>
                                                <td class="tx-right" colspan="2">
                                                    <h4 class="tx-primary tx-bold">{{ Helper::price($transaction->total) }}
                                                    </h4>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            <div class="table-responsive mg-t-40">
                                <table class="table table-invoice border text-md-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="tx-right tx-uppercase tx-bold tx-inverse">Total</td>
                                            <td class="tx-right" colspan="2">
                                                <h4 class="tx-primary tx-bold">{{ Helper::price($transaction->total) }}
                                                </h4>
                                            </td>
                                        </tr>
                                        @if ($transaction->status == 'Lunas')
                                            <tr>
                                                <td class="tx-right tx-uppercase tx-bold tx-inverse">Kembalian</td>
                                                <td class="tx-right" colspan="2">
                                                    <h4 class="tx-primary tx-bold">
                                                        {{ Helper::price($transaction->refund) }}
                                                    </h4>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if ($transaction->status == 'Belum Lunas')
                                <h5 class="mb-4 mg-t-40">Pembayaran</h5>
                                <form action="/dashboard/transactions/{{ $transaction->id }}/pay" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label
                                                    class="main-content-label tx-11 tx-medium tx-gray-600">Nominal</label>
                                                <input class="form-control @error('nominal') is-invalid @enderror"
                                                    type="text" name="nominal" value="{{ old('nominal') }}">
                                                @error('nominal')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-main-primary ms-auto">Submit</button>
                                </form>
                            @endif
                            <!--  -->
                            <a href="#" class="btn btn-danger float-end mt-3 ms-2"
                                onclick="javascript:window.print();">
                                <i class="mdi mdi-printer me-1"></i>Print
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- COL-END -->
        </div>
    </div>
@endsection
