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
                    <h4 class="content-title mb-0 my-auto">Artikel</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        Data Artikel / Edit</span>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card card-body pd-20 pd-md-40 border shadow-none">
                    <h5 class="card-title mg-b-20">Edit Artikel</h5>
                    <form action="/dashboard/articles/{{ $article->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Title</label>
                                            <input class="form-control @error('title') is-invalid @enderror" type="text"
                                                name="title" value="{{ $article->title }}">
                                            @error('title')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        {{-- <label class="main-content-label tx-11 tx-medium tx-gray-600">Alamat</label> --}}
                                        <textarea rows="4" class="form-control @error('description') is-invalid @enderror" type="text"
                                            name="description" id="mymce">{{ $article->description }}</textarea>
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
                                            class="form-control @error('category_article_id') is-invalid @enderror select2"
                                            name="category_article_id">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $article->category_article_id == $article->category_article_id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_article_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 my-3">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Gambar</label>
                                        <input type="file" id="input-file-now" name="images" class="dropify"
                                            data-default-file="{{ asset('upload/' . $article->images) }}" />
                                        @error('images')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-main-primary btn-block">Submit</button>
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
