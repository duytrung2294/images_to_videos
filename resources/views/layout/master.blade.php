<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
@include('partials.header_html')

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        @include('partials.header')
        <!-- Left side column. contains the logo and sidebar -->
        @include('partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')

        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('partials.footer')
        <!-- Control Sidebar -->
        @include('partials.controll_sidebar')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    @include('partials.script')
</body>

</html>