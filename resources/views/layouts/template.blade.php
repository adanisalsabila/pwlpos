<!DOCTYPE html>
 <html lang="en">

 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'kipopztore') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Times+New+Roman:400,400i,700,700i&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte3/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <style>
   body {
    font-family: 'Times New Roman', serif !important;
    background-color: #f9f9f9; /* Putih keabu-abuan lembut sebagai latar belakang */
    color: #333; /* Teks abu-abu gelap */
    transition: background-color 0.3s ease; /* Efek transisi halus untuk perubahan latar belakang */
   }

   .wrapper {
    background-color: #fff; /* Putih untuk wrapper */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan tipis */
   }

   .main-sidebar {
    background-color: #eee !important; /* Putih pucat untuk sidebar */
    box-shadow: 3px 0 5px rgba(0, 0, 0, 0.05); /* Efek bayangan tipis di sisi kanan */
    transition: background-color 0.3s ease;
   }

   .brand-link {
    background-color: #fff !important; /* Putih untuk brand link */
    color: #333 !important;
    border-bottom: 1px solid #ddd; /* Garis pemisah tipis */
   }

   .brand-link:hover {
    background-color: #f0f0f0 !important; /* Efek hover sedikit lebih gelap */
   }

   .nav-sidebar>.nav-item>.nav-link {
    color: #555;
    transition: background-color 0.3s ease, color 0.3s ease;
   }

   .nav-sidebar>.nav-item>.nav-link.active,
   .nav-sidebar>.nav-item>.nav-link:hover {
    background-color: #f0f0f0 !important; /* Efek hover/aktif sedikit lebih gelap */
    color: #007bff !important; /* Warna biru untuk yang aktif/hover */
   }

   .content-wrapper {
    background-color: #fff; /* Putih untuk content wrapper */
   }

   .main-header {
    background-color: #fff !important; /* Putih untuk header */
    color: #333 !important;
    border-bottom: 1px solid #ddd; /* Garis pemisah tipis */
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05); /* Efek bayangan tipis di bawah */
   }

   .main-footer {
    background-color: #eee !important; /* Putih pucat untuk footer */
    color: #555 !important;
    border-top: 1px solid #ddd; /* Garis pemisah tipis */
   }

   .btn-primary {
    background-color: #007bff !important; /* Biru primer */
    border-color: #007bff !important;
    color: #fff !important;
    box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2); /* Efek bayangan tombol */
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
   }

   .btn-primary:hover {
    background-color: #0056b3 !important; /* Biru lebih gelap saat hover */
    box-shadow: 0 4px 6px rgba(0, 86, 179, 0.3);
   }

   /* Efek transisi untuk elemen lain jika diperlukan */
   .brand-link, .content-wrapper, .main-header, .main-footer, .btn {
    transition: all 0.3s ease;
   }
  </style>

  @stack('css')
 </head>

 <body class="hold-transition sidebar-mini">
  <div class="wrapper">
   @include('layouts.header')

   <aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
     <img src="{{ asset('adminlte3/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">kipopztore</span>
    </a>

    @include('layouts.sidebar')
   </aside>

   <div class="content-wrapper">
    @include('layouts.breadcrumb')

    <section class="content">
     @yield('content')
    </section>
   </div>

   @include('layouts.footer')
  </div>

  <script src="{{ asset('adminlte3/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/buttons.colvis.min.js') }}"></script>
  <script src="{{ asset('adminlte3/dist/js/adminlte.min.js') }}"></script>

  <script src="{{ asset('adminlte3/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('adminlte3/plugins/jquery-validation/additional-methods.min.js') }}"></script>

  <script src="{{ asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

  <script>
   $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
  </script>

  @stack('js')
 </body>

 </html>
