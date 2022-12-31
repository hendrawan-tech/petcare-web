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
                    <h4 class="content-title mb-0 my-auto">Produk</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Data Produk / Tambah</span>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card card-body pd-20 pd-md-40 border shadow-none">
                    <h5 class="card-title mg-b-20">Tambah Produk</h5>
                    <form action="/dashboard/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                                name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        {{-- <label class="main-content-label tx-11 tx-medium tx-gray-600">Alamat</label> --}}
                                        <textarea rows="4" class="form-control @error('description') is-invalid @enderror" type="text"
                                            name="description" id="mymce">{{ old('description') }}</textarea>
                                        @error('description')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Kategori</label>
                                        <select
                                            class="form-control @error('product_category_id') is-invalid @enderror select2"
                                            name="product_category_id">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('product_category_id') ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_category_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Harga</label>
                                            <input class="form-control @error('price') is-invalid @enderror"
                                                type="text" name="price" value="{{ old('price') }}">
                                            @error('price')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Stok</label>
                                            <input class="form-control @error('stock') is-invalid @enderror" type="text"
                                                name="stock" value="{{ old('stock') }}">
                                            @error('stock')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Gambar</label>
                                        <input type="file" id="input-file-now" name="image" class="dropify" />
                                        @error('image')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-main-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
