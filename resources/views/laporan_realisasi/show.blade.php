<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Detail Pengeluaran | Admin Panel</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/lineicons.css" />
    <link rel="stylesheet" href="/assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
  </head>
  <body>
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
                  <h2>Detail Pengeluaran - {{ $sumberDana->nama_sumber }}</h2>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="mb-0">Detail Realisasi: {{ $sumberDana->nama_sumber }}</h6>
</div>

<!-- Filter Bulan & Tahun -->
<form method="GET" action="{{ route('laporan_realisasi.show', $sumberDana->id) }}" class="mb-4 d-flex gap-2">
    <select name="bulan" class="form-select" style="width: auto;">
        <option value="">-- Pilih Bulan --</option>
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
            </option>
        @endfor
    </select>

    <select name="tahun" class="form-select" style="width: auto;">
        <option value="">-- Pilih Tahun --</option>
        @for ($i = date('Y'); $i >= 2020; $i--)
            <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
    </select>

    <button type="submit" class="btn btn-primary">
        Filter
    </button>
</form>

              </div>
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="{{ route('laporan_realisasi.index') }}">Laporan Realisasi</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Detail Pengeluaran
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
                  <h6 class="mb-0">Daftar Pengeluaran</h6>
                </div>

                <div class="table-wrapper table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><h6>No</h6></th>
                        <th><h6>Tanggal</h6></th>
                        <th><h6>Uraian</h6></th>
                        <th><h6>Kode Kegiatan</h6></th>
                        <th class="text-end"><h6>Nominal</h6></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($pengeluarans as $index => $pengeluaran)
                        <tr>
                          <td><p>{{ $index + 1 }}</p></td>
                          <td><p>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d-m-Y') }}</p></td>
                          <td><p>{{ $pengeluaran->uraian }}</p></td>
                          <td><p>{{ $pengeluaran->kegiatan->kode_kegiatan }}</p></td>
                          <td class="text-end"><p>Rp {{ number_format($pengeluaran->nominal, 0, ',', '.') }}</p></td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="5" class="text-center">Belum ada data pengeluaran</td>
                        </tr>
                      @endforelse
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="4" class="text-end">Total Pengeluaran</th>
                        <th class="text-end fw-bold">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <div class="mt-3">
                  <a href="{{ route('laporan_realisasi.index') }}" class="btn btn-secondary">
                    Kembali
                  </a>
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
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/Chart.min.js"></script>
    <script src="/assets/js/dynamic-pie-chart.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/fullcalendar.js"></script>
    <script src="/assets/js/jvectormap.min.js"></script>
    <script src="/assets/js/world-merc.js"></script>
    <script src="/assets/js/polyfill.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>
