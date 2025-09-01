<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Penerimaan Sumber Dana | Admin Panel</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
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
                  <h2>Daftar Penerimaan per Sumber Dana</h2>
                </div>
              </div>
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Penerimaan Sumber Dana
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->

          <!-- ========== table start ========== -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="mb-0">Daftar Penerimaan</h6>
                  <a href="{{ route('penerimaan-sumber-dana.create') }}" class="btn btn-primary btn-sm">
                    + Tambah Penerimaan
                  </a>
                </div>

                @if(session('success'))
                  <div class="alert alert-success mb-3">
                    {{ session('success') }}
                  </div>
                @endif

                <div class="table-wrapper table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><h6>Tanggal</h6></th>
                        <th><h6>Sumber Dana</h6></th>
                        {{-- <th><h6>Uraian</h6></th> --}}
                        <th><h6>Nominal</h6></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($penerimaans as $p)
                      <tr>
                        <td><p>{{ \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}</p></td>
                        <td class="min-width"><p>{{ $p->sumberDana->nama_sumber }}</p></td>
                        <td class="min-width"><p>{{ number_format($p->nominal, 0, ',', '.') }}</p></td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="4" class="text-center">Belum ada data penerimaan</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                  {{ $penerimaans->links() }}
                </div>
              </div>
            </div>
          </div>
          <!-- ========== table end ========== -->
        </div>
      </section>

      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="mb-0">© {{ date('Y') }} Admin Panel</p>
            </div>
          </div>
        </div>
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
