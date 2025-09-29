<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Laporan Realisasi Sumber Dana | Admin Panel</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
        /* Custom CSS for responsiveness */
        @media (max-width: 767.98px) {
            /* Table Transformation for Mobile */
            .table-responsive.card-list .table {
                display: block;
                width: 100%;
                overflow-x: auto;
            }

            .table-responsive.card-list thead {
                display: none; /* Hide table headers on small screens */
            }

            .table-responsive.card-list tbody,
            .table-responsive.card-list tr {
                display: block;
                margin-bottom: 15px; /* Add space between "cards" */
                border: 1px solid #e5e5e5;
                border-radius: 8px;
                padding: 10px;
                background-color: #ffffff;
            }

            .table-responsive.card-list td {
                display: block;
                text-align: right !important;
                padding-left: 50% !important; /* Make room for the label */
                position: relative;
                border: none; /* Remove cell borders */
            }

            .table-responsive.card-list td::before {
                /* Create custom labels from data-label attribute */
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: calc(50% - 30px);
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
                color: #5d6588; /* Match main content color */
            }

            /* Center align titles and breadcrumbs for better mobile presentation */
            .title-wrapper .row .col-md-6:nth-child(1) {
                order: 2;
            }
            .title-wrapper .row .col-md-6:nth-child(2) {
                order: 1;
            }
            .title-wrapper .title,
            .breadcrumb-wrapper {
                text-align: center;
                margin-bottom: 15px;
            }
            .title-wrapper .pt-30 {
                padding-top: 15px !important;
            }

            /* Adjust text alignment for mobile "card" view */
            .table-responsive.card-list td p {
                text-align: right !important;
            }
            
            /* MODIFIKASI: Tombol Aksi berada di kanan */
            .table-responsive.card-list td[data-label="Aksi"] {
                text-align: right !important; /* Pindahkan tombol ke kanan */
                padding-left: 15px !important; /* Hapus padding yang dibuat untuk label */
            }

            /* MODIFIKASI: Sembunyikan label "Aksi" */
            .table-responsive.card-list td[data-label="Aksi"]::before {
                content: ""; /* Hapus konten label "Aksi" */
                display: none;
            }
        }
    </style>
  </head>
  <body>
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <x-sidenav></x-sidenav>
    <div class="overlay"></div>
    <main class="main-wrapper">
      <x-topheader></x-topheader>
      <section class="section">
        <div class="container-fluid">
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Laporan Realisasi per Sumber Dana</h2>
                </div>
                {{-- Filter form (commented out in original code) --}}
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
          <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="mb-0">Realisasi Sumber Dana</h6>
                </div>

               <div class="table-wrapper table-responsive card-list">
  <table class="table">
    <thead>
      <tr>
        <th><h6>No</h6></th>
        <th><h6>Nama Sumber Dana</h6></th>
        <th class="text-end"><h6>Total Penerimaan</h6></th>
        <th class="text-end"><h6>Total Pengeluaran</h6></th>
        <th class="text-end"><h6>Sisa Saldo</h6></th>
        <th class="text-center"><h6>Aksi</h6></th>
      </tr>
    </thead>
    <tbody>
      @forelse($sumberDanas as $i => $sd)
        <tr>
          <td data-label="No"><p>{{ $i+1 }}</p></td>
          <td data-label="Nama Sumber Dana"><p>{{ $sd->nama_sumber }}</p></td>
          <td class="text-end" data-label="Total Penerimaan"><p class="fw-bold">{{ number_format($sd->total_penerimaan, 0, ',', '.') }}</p></td>
          <td class="text-end" data-label="Total Pengeluaran"><p class="fw-bold">{{ number_format($sd->total_pengeluaran, 0, ',', '.') }}</p></td>
          <td class="text-end" data-label="Sisa Saldo"><p class="fw-bold">{{ number_format($sd->saldo, 0, ',', '.') }}</p></td>
          <td class="text-center" data-label="Aksi">
            <a href="{{ route('laporan_realisasi.show', $sd->id) }}" class="btn btn-primary btn-sm text-white">
              Detail
            </a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">Belum ada data realisasi</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

              </div>
            </div>
          </div>
          </div>
      </section>

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="mb-0">© {{ date('Y') }} Admin Panel</p>
            </div>
          </div>
        </div>
      </footer>
      </main>
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