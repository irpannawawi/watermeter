<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Smart Wather Meter | IOT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets') }}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ url('assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ url('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css">

    <link href="{{ url('assets') }}/libs/chartist/chartist.min.css" rel="stylesheet" />

    <!-- App Css-->
    <link href="{{ url('assets') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.navigation')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container">
                    @yield('content')
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            HPW05<span class="d-none d-sm-inline-block"> - Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by Adli & Bima.</span>
                        </div>
                    </div>
                </div>
            </footer>


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ url('assets') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ url('assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('assets') }}/libs/node-waves/waves.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- sweet alert --}}
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}',
            })
            Swal.fire(
                'Good job!',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif

    @yield('scripts')

    <script src="{{ url('assets') }}/js/app.js"></script>

</body>

</html>
