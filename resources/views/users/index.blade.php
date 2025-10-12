<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="shortcut icon" href="img/pesat.png" type="image/x-icon" />
  <title>Manajemen User</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/lineicons.css" />
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="assets/css/fullcalendar.css" />
  <link rel="stylesheet" href="assets/css/main.css" />

  <style>
    /* ===== Table ke Card di Mobile ===== */
    @media (max-width: 767.98px) {
      .table-responsive.card-list table,
      .table-responsive.card-list thead,
      .table-responsive.card-list tbody,
      .table-responsive.card-list th,
      .table-responsive.card-list td,
      .table-responsive.card-list tr {
        display: block;
        width: 100%;
      }

      .table-responsive.card-list thead {
        display: none;
      }

      .table-responsive.card-list tr {
        margin-bottom: 1rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
      }

      .table-responsive.card-list td {
        border: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 6px 10px;
        font-size: 14px;
        position: relative;
      }

      .table-responsive.card-list td::before {
        content: attr(data-label);
        font-weight: 600;
        flex: 1;
        text-align: left;
        color: #555;
      }

      .table-responsive.card-list td p {
        margin: 0;
        flex: 1;
        text-align: right;
      }

      /* Tombol Aksi tetap rata kanan */
      .table-responsive.card-list td[data-label="Aksi"] {
        justify-content: flex-end;
      }

      .table-responsive.card-list td[data-label="Aksi"] .action-buttons {
        display: flex;
        gap: 6px;
      }

      /* Header judul & breadcrumb rata tengah */
      .title-wrapper .title h2,
      .title-wrapper .title p,
      .breadcrumb-wrapper {
        text-align: center;
      }

      /* Tombol tambah user turun ke bawah */
      .d-flex.justify-content-between {
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }

      .d-flex.justify-content-between .btn {
        width: 100%;
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
        {{-- Header Halaman --}}
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title mb-30">
                <h2>Manajemen User</h2>
                <p>Kelola user yang dapat mengakses sistem.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="breadcrumb-wrapper mb-30">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{ url('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Manajemen User
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>

        {{-- Konten Utama --}}
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style mb-30">
              {{-- Judul + Tombol --}}
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0 text-bold">Daftar User</h6>
                <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm text-white">
                  <i data-lucide="plus-circle" class="me-1" style="width:16px; height:16px;"></i>
                  Tambah User Baru
                </a>
              </div>

              {{-- Tabel User --}}
              <div class="table-wrapper table-responsive card-list">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center"><h6>No.</h6></th>
                      <th><h6>Nama Lengkap</h6></th>
                      <th><h6>Email</h6></th>
                      <th class="text-center"><h6>Aksi</h6></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key => $user)
                      <tr>
                        <td class="text-center" data-label="No."><p>{{ $key + 1 }}</p></td>
                        <td data-label="Nama Lengkap"><p>{{ $user->name }}</p></td>
                        <td data-label="Email"><p>{{ $user->email }}</p></td>
                        <td class="text-center" data-label="Aksi">
                          <div class="action-buttons">
                            <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-warning btn-sm" title="Edit">
                              <i data-lucide="pencil" style="width:14px; height:14px;"></i>
                            </a>
                            <form action="{{ url('users/' . $user->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Anda yakin ingin menghapus user ini?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                <i data-lucide="trash-2" style="width:14px; height:14px;"></i>
                              </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                <div class="mt-4">
                          {{ $users->links() }}
                        </div>
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

  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</body>
</html>
