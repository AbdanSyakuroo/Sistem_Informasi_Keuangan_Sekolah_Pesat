<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Laporan Realisasi Sumber Dana | Admin Panel</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
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
                  <h2>Laporan Realisasi per Sumber Dana</h2>
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
                        Laporan Realisasi
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
                  <h6 class="mb-0">Realisasi Sumber Dana</h6>
                </div>

                <div class="table-wrapper table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><h6>No</h6></th>
                        <th><h6>Nama Sumber Dana</h6></th>
                        <th class="text-end"><h6>Total Penerimaan</h6></th>
                        <th class="text-end"><h6>Total Pengeluaran</h6></th>
                        <th class="text-end"><h6>Sisa Saldo</h6></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($sumberDanas as $i => $sd)
                        <tr>
                          <td><p>{{ $i+1 }}</p></td>
                          <td><p>{{ $sd->nama_sumber }}</p></td>
                          <td class="text-end"><p>{{ number_format($sd->total_penerimaan, 0, ',', '.') }}</p></td>
                          <td class="text-end"><p>{{ number_format($sd->total_pengeluaran, 0, ',', '.') }}</p></td>
                          <td class="text-end fw-bold"><p>{{ number_format($sd->saldo, 0, ',', '.') }}</p></td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="5" class="text-center">Belum ada data realisasi</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
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
