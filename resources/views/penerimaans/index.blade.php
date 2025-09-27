<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    <x-sidenav></x-sidenav>
    
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <x-topheader></x-topheader>
      <!-- ========== header end ========== -->

 <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Penerimaan Harian</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="dashboard">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Penerimaan
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>


             <div class="tables-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card-style mb-30">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h6 class="mb-0">Daftar Penerimaan</h6>
          <a href="{{ route('penerimaans.create') }}" class="btn btn-primary btn-sm">
            Tambah
          </a>
        </div>

        @if (session('success'))
          <div class="alert alert-success mb-3">
            {{ session('success') }}
          </div>
        @endif

        <div class="table-wrapper table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th><h6>No</h6></th>
                <th><h6>Tanggal</h6></th>
                <th><h6>Uraian</h6></th>
                <th class="text-end"><h6>Nominal</h6></th>
                <th class="ps-5"><h6>Aksi</h6></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penerimaans as $key => $item)
                <tr>
                  <td><p>{{ $penerimaans->firstItem() + $key }}</p></td>
                  <td><p>{{ $item->tanggal }}</p></td>
                  <td><p>{{ $item->uraian }}</p></td>
                  <td class="text-end"><p class="fw-bold">Rp {{ number_format($item->nominal, 0, ',', '.') }}</p></td>
                  <td class="ps-5">
                    <div class="action d-flex gap-2">
                      <a href="{{ route('penerimaans.edit', $item->id) }}" class="text-primary">
                        <i class="lni lni-pencil"></i>
                      </a>
                      <form action="{{ route('penerimaans.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-danger border-0 bg-transparent p-0" 
                                onclick="return confirm('Hapus data ini?')">
                          <i class="lni lni-trash-can"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <!-- Pagination -->
          <div class="mt-4">
            {{ $penerimaans->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>