<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8" />
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
            content="Premium Multipurpose Admin & Dashboard Template"
            name="description"
    />
    <meta content="Themesbrand" name="author" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
    />
    <link
            rel="stylesheet"
            href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css"
    />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <!-- DataTables -->
    <link
            href="{{ asset('assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
            rel="stylesheet"
            type="text/css"
    />
    <link
            href="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
            rel="stylesheet"
            type="text/css"
    />

    <!-- jquery.vectormap css -->
    <link
            href="{{ asset('assets') }}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
            rel="stylesheet"
            type="text/css"/>

    <!-- Bootstrap Css -->
    <link
            href="{{ asset('assets') }}/css/bootstrap.min.css"
            id="bootstrap-style"
            rel="stylesheet"
            type="text/css"
    />
    <!-- Icons Css -->
    <link
            href="{{ asset('assets') }}/css/icons.min.css"
            rel="stylesheet"
            type="text/css"
    />
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css"
            id="app-style"
            rel="stylesheet"
            type="text/css"/>
    
    @stack('css')
</head>

<body data-layout="detached" data-topbar="colored">
<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<div class="container-fluid">
  
    <div id="layout-wrapper">
     
        @include('backend.include.topbar')
     

        @include('backend.include.side-menu')

        @yield('content')
       
    </div>
    <!-- END layout-wrapper -->
</div>

<!-- end container-fluid -->

<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('assets') }}/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="{{ asset('assets') }}/js/app.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
    });
</script>
@stack('js')
</body>
</html>
