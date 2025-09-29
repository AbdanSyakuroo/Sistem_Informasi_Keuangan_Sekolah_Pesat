<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Daftar Pengeluaran</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <style>
      /* === Responsive Table Style === */
      @media (max-width: 767.98px) {
        table thead {
          display: none; /* sembunyikan header */
        }

        table tbody tr {
          display: block;
          margin-bottom: 15px;
          border: 1px solid #ddd;
          border-radius: 8px;
          padding: 10px;
          background: #f9f9f9;
        }

        table tbody td {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 6px 10px;
          border: none !important;
          text-align: left;
        }

        table tbody td::before {
          content: attr(data-label);
          font-weight: bold;
          flex: 1;
          text-align: left;
        }

        table tbody td span {
          flex: 2;
          text-align: right;
        }
      }
    </style>
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
                  <h2>Daftar Pengeluaran</h2>
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
                        Pengeluaran
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="tables-wrapper mt-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Data Pengeluaran</h6>
                    <a href="{{ route('pengeluarans.create') }}" class="btn btn-primary btn-sm">
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
                          <th><h6>Kegiatan</h6></th>
                          <th><h6>Sumber Dana</h6></th>
                          <th><h6>Uraian</h6></th>
                          <th class="text-end"><h6>Nominal</h6></th>
                          <th class="ps-3"><h6>Aksi</h6></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($pengeluarans as $key => $item)
                          <tr>
                            <td data-label="No"><span>{{ $pengeluarans->firstItem() + $key }}</span></td>
                            <td data-label="Tanggal"><span>{{ $item->tanggal }}</span></td>
                            <td data-label="Kegiatan"><span>{{ $item->kegiatan->kode_kegiatan }}</span></td>
                            <td data-label="Sumber Dana"><span>{{ $item->sumberDana->nama_sumber }}</span></td>
                            <td data-label="Uraian"><span>{{ $item->uraian }}</span></td>
                            <td data-label="Nominal"><span class="fw-bold">Rp {{ number_format($item->nominal, 0, ',', '.') }}</span></td>
                            <td data-label="Aksi">
                              <span>
                                <div class="d-flex justify-content-end gap-2">
                                  <a href="{{ route('pengeluarans.edit', $item->id) }}" class="text-primary">
                                    <i class="lni lni-pencil"></i>
                                  </a>
                                  <form action="{{ route('pengeluarans.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-danger border-0 bg-transparent p-0"
                                            onclick="return confirm('Hapus data ini?')">
                                      <i class="lni lni-trash-can"></i>
                                    </button>
                                  </form>
                                </div>
                              </span>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="7">
                              <p class="text-center text-muted">Tidak ada data pengeluaran.</p>
                            </td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                      {{ $pengeluarans->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
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
