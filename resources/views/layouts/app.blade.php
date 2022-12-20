<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="Petcare, Bontang, App, Doctor" />

    <title> PetCare App </title>
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfect-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/sidemenu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/boxed.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-boxed.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
            padding: 0.375rem 0.75rem;
            border: 1px solid #e1e5ef !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            margin-top: 5px !important;
        }
    </style>
    @stack('styles')

</head>

<body class="main-body app sidebar-mini">

    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>

    <div class="page">
        @include('layouts.sidebar')
        <div class="main-content app-content">
            <div class="main-header sticky side-header nav nav-item">
                <div class="container-fluid">
                    <div class="main-header-left ">
                        <div class="responsive-logo">
                            <a href="index.html"><img src="{{ asset('assets/img/brand/logo.png') }}" class="logo-1"
                                    alt="logo"></a>
                            <a href="index.html"><img src="{{ asset('assets/img/brand/logo-white.png') }}"
                                    class="dark-logo-1" alt="logo"></a>
                            <a href="index.html"><img src="{{ asset('assets/img/brand/favicon.png') }}" class="logo-2"
                                    alt="logo"></a>
                            <a href="index.html"><img src="{{ asset('assets/img/brand/favicon-white.png') }}"
                                    class="dark-logo-2" alt="logo"></a>
                        </div>
                        <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                            <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                            <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="main-header-right">
                        <ul class="nav nav-item  navbar-nav-right ms-auto">
                            <li class="nav-item full-screen fullscreen-button">
                                <a class="new nav-link full-screen-link" href="#"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-maximize">
                                        <path
                                            d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                        </path>
                                    </svg></a>
                            </li>

                            <li class="dropdown main-profile-menu nav nav-item nav-link">
                                <a class="profile-user d-flex" href=""><img alt=""
                                        src="{{ Auth::user()->avatar ? asset('upload/' . Auth::user()->avatar) : asset('assets/img/faces/6.jpg') }}"></a>
                                <div class="dropdown-menu">
                                    <div class="main-header-profile p-3" style="background: #22B455;">
                                        <div class="d-flex wd-100p">
                                            <div class="main-img-user"><img alt=""
                                                    src="{{ Auth::user()->avatar ? asset('upload/' . Auth::user()->avatar) : asset('assets/img/faces/6.jpg') }}"
                                                    class=""></div>
                                            <div class="ms-3 my-auto">
                                                <h6>{{ Auth::user()->name }}</h6>
                                                <span>{{ Auth::user()->roles->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="/dashboard/settings/profile">
                                        <i class="bx bx-user-circle"></i>
                                        Profil
                                    </a>
                                    <a class="dropdown-item" data-bs-target="#exampleModalLg" data-bs-toggle="modal"
                                        href="">
                                        <i class="bx bx-log-out"></i>
                                        Keluar
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        <div class="main-footer ht-40">
            <div class="container-fluid pd-t-0-f ht-100p">
                <span>Copyright © 2021 <a href="#">Petcare</a>. Designed by <a href="#">C3</a> All rights
                    reserved.</span>
            </div>
        </div>
    </div>
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    <div class="modal fade" id="exampleModalLg">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align:center;">Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p><b>{{ Auth::user()->name }}</b>, apakah anda yakin ingin keluar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                        class="btn btn-danger" href="">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <form action="" method="POST" name="formdelete">
                    @method('delete')
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align:center;">Delete Data</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalLg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&#xD7;</span></button>
                </div>
                <div class="modal-body">
                    <p><b>{{ Auth::user()->name }}</b>, apakah anda yakin ingin keluar?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href=""
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Ionicons js -->
    <script src="{{ asset('assets/plugins/ionicons/ionicons.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!--Internal Sparkline js -->
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>

    <!--Internal Apexchart js-->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>

    <!-- Rating js-->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/jquery.barrating.js') }}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

    <!-- Eva-icons js -->
    <script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>

    <!-- right-sidebar js -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/modal-popup.js') }}"></script>

    <!-- Left-menu js-->
    <script src="{{ asset('assets/plugins/side-menu/sidemenu.js') }}"></script>

    <!--Internal  Datatable js -->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>

    <!-- Internal Map -->
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <!--Internal  index js -->
    <script src="{{ asset('assets/js/index.js') }}"></script>

    <!-- Apexchart js-->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/form-elements.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @if (session()->has('success'))
        <script>
            const notyf = new Notyf({
                dismissible: true
            })
            notyf.success('{{ session('success') }}')
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        function modal_konfir(url) {
            $('#modal_delete').modal('show', {
                backdrop: 'static'
            });
            document.formdelete.action = url;
        }

        function modal_konfir_custom(url, pesan) {
            $('#modal_konfirmasi').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('link_goto').setAttribute('href', url);
            document.getElementById('modal_pesan').innerHTML = pesan;
        }

        document.addEventListener('alpine:init', () => {
            Alpine.data('imageViewer', (src = '') => {
                return {
                    imageUrl: src,

                    refreshUrl() {
                        this.imageUrl = this.$el.getAttribute("image-url")
                    },

                    fileChosen(event) {
                        this.fileToDataUrl(event, src => this.imageUrl = src)
                    },

                    fileToDataUrl(event, callback) {
                        if (!event.target.files.length) return

                        let file = event.target.files[0],
                            reader = new FileReader()

                        reader.readAsDataURL(file)
                        reader.onload = e => callback(e.target.result)
                    },
                }
            })
        })
    </script>
    @stack('scripts')

</body>

</html>
