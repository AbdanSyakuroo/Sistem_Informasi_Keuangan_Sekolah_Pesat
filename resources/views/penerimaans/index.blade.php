<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Penerimaan Harian</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <style>
      /* === RESPONSIVE TABLE CARD MODE === */
      @media (max-width: 767.98px) {
        table thead {
          display: none;
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

        /* khusus kolom aksi */
        table tbody td[data-label="Aksi"] {
          justify-content: flex-end;
        }
        table tbody td[data-label="Aksi"]::before {
          display: none;
        }
        table tbody td[data-label="Aksi"] span {
          flex: unset;
          text-align: right;
        }
      }
    </style>
  </head>
  <body>
    <div id="preloader"><div class="spinner"></div></div>
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
                  <h2>Penerimaan Harian</h2>
                </div>
              </div>
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="dashboard">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Penerimaan Harian
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>

              <div class="tables-wrapper">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card-style mb-30">
                      <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-3">
                        <h6 class="mb-2 mb-sm-0 text-center text-sm-start">Daftar Penerimaan</h6>
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
                              <th class="text-nowrap" style="width: 5%"><h6>#</h6></th>
                              <th class="text-nowrap" style="width: 15%"><h6>Tanggal</h6></th>
                              <th style="width: 45%"><h6>Uraian</h6></th>
                              <th class="text-end text-nowrap" style="width: 25%"><h6>Nominal</h6></th>
                              <th class="text-nowrap text-end" style="width: 10%"><h6>Aksi</h6></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($penerimaans as $key => $item)
                              <tr>
                                <td data-label="#"><span>{{ $penerimaans->firstItem() + $key }}</span></td>
                                <td data-label="Tanggal"><span>{{ $item->tanggal }}</span></td>
                                <td data-label="Uraian"><span>{{ $item->uraian }}</span></td>
                                <td data-label="Nominal" class="text-end">
                                  <span class="fw-bold text-nowrap">Rp {{ number_format($item->nominal, 0, ',', '.') }}</span>
                                </td>
                                <td data-label="Aksi" class="text-end">
                                  <span>
                                    <div class="action d-flex flex-nowrap gap-2 justify-content-end">
                                      <a href="{{ route('penerimaans.edit', $item->id) }}" class="text-primary" title="Edit">
                                        <i class="lni lni-pencil"></i>
                                      </a>
                                      <form action="{{ route('penerimaans.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-danger border-0 bg-transparent p-0" 
                                                onclick="return confirm('Hapus data ini?')" title="Hapus">
                                          <i class="lni lni-trash-can"></i>
                                        </button>
                                      </form>
                                    </div>
                                  </span>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>

                        <div class="mt-4">
                          {{ $penerimaans->links() }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>

      <footer class="footer">
        <div class="container-fluid"></div>
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
