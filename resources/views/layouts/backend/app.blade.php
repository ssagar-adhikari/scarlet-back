<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Scarlet Homes</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/backend') }}/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/backend') }}/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="{{ asset('assets/backend') }}/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/backend') }}/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="{{ asset('assets/backend') }}/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/backend') }}/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/backend') }}/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

    <link href="{{ asset('assets/backend') }}/css/custom.css" rel="stylesheet" />
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ asset('assets/backend') }}/css/sleek.css" />

    {{-- datatable  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    {{-- datatable  --}}



    <!-- FAVICON -->
    <link href="{{ asset('assets/backend') }}/img/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="{{ asset('assets/backend') }}/plugins/nprogress/nprogress.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts') }}/remixicon.css" />

    <link href="{{ asset('assets/frontend') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        @include('layouts.backend.partials.sidebar')
        <div class="page-wrapper">
            <!-- Header -->
            @include('layouts.backend.partials.nav')
            @include('includes.partials.messages')
            @yield('content')
            @include('layouts.backend.partials.footer')
        </div>
    </div>


    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script> --}}
    <script src="{{ asset('assets/backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/toaster/toastr.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/charts/Chart.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/ladda/spin.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/ladda/ladda.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jquery-mask-input/jquery.mask.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/select2/js/select2.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/daterangepicker/moment.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/jekyll-search.min.js"></script>
    <script src="{{ asset('assets/backend') }}/js/sleek.js"></script>
    <script src="{{ asset('assets/backend') }}/js/chart.js"></script>
    <script src="{{ asset('assets/backend') }}/js/date-range.js"></script>
    <script src="{{ asset('assets/backend') }}/js/map.js"></script>
    <script src="{{ asset('assets/backend') }}/js/custom.js"></script>

    {{-- datatable --}}
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#title").keyup(function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#slug").val(Text);
            });
            $('#table').DataTable({
                "bSort": false
            });
        });
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        CKEDITOR.replace('description', options);
          CKEDITOR.replace('short_description', options);
    </script>
    {{-- datatable --}}

    {{-- <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable();
        });
    </script> --}}

    @yield('script')
</body>

</html>
