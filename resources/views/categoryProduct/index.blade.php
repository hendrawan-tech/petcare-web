@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Produk</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Data Kategori Produk</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">
                <div class="pe-1 mb-xl-0">
                    <a href="/dashboard/category-products/create" class="btn btn-primary">
                        <i class="mdi mdi-plus me-2"></i>
                        Tambah Kategori Produk
                    </a>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Data Kategori Produk</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Semua data Kategori Produk</a></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Nama</th>
                                        <th class="wd-15p border-bottom-0">Tanggal Dibuat</th>
                                        <th class="wd-10p border-bottom-0">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoryProducts as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="d-flex align-items-center">
                                                <a href="/dashboard/category-products/{{ $item->id }}/edit"
                                                    class="btn me-2 btn-primary btn-icon">
                                                    <i class="typcn typcn-pencil"></i>
                                                </a>
                                                <a onclick='modal_konfir("/dashboard/category-products/{{ $item->id }}")'
                                                    href="#" class="btn btn-danger btn-icon">
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
