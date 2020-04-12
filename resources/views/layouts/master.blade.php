<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    
  </title>
  <!-- Favicon -->
  <link href="{{asset('admin/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('admin/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('admin/css/argon-dashboard.css?v=1.1.0')}}" rel="stylesheet" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body class="">
  @include('layouts.includes.sidebar')
  <div class="main-content">
    <!-- Navbar -->
    @include('layouts.includes.navbar')
    <!-- End Navbar -->
    <!-- Header -->
    @include('layouts.includes.header')
    <!-- End Header -->
    <div class="container-fluid mt--7">
      <!-- Content -->
          @yield('content')
      <!-- End Content -->

      <!-- Footer -->
        @include('layouts.includes.footer')
      <!-- End Footer -->
    </div>
  </div>
  {{-- datepicker --}}
  <script src="{{asset('admin/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

  <!--   Core   -->
  <script src="{{asset('admin/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  <script src="{{asset('admin/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('admin/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
  <!--   Argon JS   -->
  <script src="{{asset('admin/js/argon-dashboard.min.js?v=1.1.0')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  {{-- Jquery --}}
  <script src="{{asset('admin/js/jquery.min.js')}}"></script> 
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      
  </script>
  @yield('admin-js')
</body>

</html>