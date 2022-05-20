@include('admin.header')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.navbar')

        <!-- Main Sidebar Container -->
        @include('admin.sidebar')
        
        <!--Content-->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!--Footer-->
        @include('admin.footer')

    </div>
<script src="{{asset('js/app.js')}}"></script>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/admin/admin.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('plugins/adminlte.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>
</html>