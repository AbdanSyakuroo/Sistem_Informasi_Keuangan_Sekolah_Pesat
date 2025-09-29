<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
      /* Ensure the table responsive wrapper works as intended */
      .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
      
      /* Optional: Reduce padding on smaller screens for more space */
      @media (max-width: 575.98px) {
          .card-style {
              padding: 15px; /* Smaller padding on very small screens */
          }
      }

      /* Adjust action column display on small screens */
      @media (max-width: 767.98px) { /* Adjusts for sm and xs screens */
        .action.flex {
            /* Change from flex-row to flex-col on small screens if necessary, 
               but for two small icons, gap-2 works fine. Keep it concise. */
            gap: 0.5rem !important;
        }
        
        /* Reduce min-width on table columns to allow table to shrink */
        .table td.min-width, .table th.min-width {
            min-width: 100px; /* Adjust as needed */
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
                  <h2>Data Kegiatan</h2>
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
                        Kegiatan
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
                        <h6 class="mb-2 mb-sm-0 text-center text-lg-start">Daftar Kegiatan</h6>
                        <a href="{{ route('kegiatans.create') }}" class="btn btn-primary btn-sm">
                          Tambah
                        </a>
                      </div>
                      <p class="text-sm mb-20 text-center text-lg-start">
                        Daftar kegiatan yang tersedia dalam database.
                      </p>
<div class="table-wrapper table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th class="text-nowrap" style="width: 5%"><h6>#</h6></th>
        <th class="text-nowrap" style="width: 25%"><h6>Kode Kegiatan</h6></th>
        <th style="width: 55%"><h6>Nama Kegiatan</h6></th>
        <th class="text-nowrap" style="width: 15%"><h6>Aksi</h6></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kegiatans as $key => $item)
      <tr>
        <td>
          <p class="text-nowrap">{{ $kegiatans->firstItem() + $key }}</p>
        </td>
        <td class="text-nowrap">
          <p>{{ $item->kode_kegiatan }}</p>
        </td>
        <td>
          <p>{{ $item->nama_kegiatan }}</p>
        </td>
        <td>
          <div class="action flex flex-nowrap justify-content-start gap-2">
            <a href="{{ route('kegiatans.edit', $item->id) }}" class="text-primary" title="Edit">
              <i class="lni lni-pencil"></i>
            </a>
            <form action="{{ route('kegiatans.destroy', $item->id) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button type="submit" class="text-danger" onclick="return confirm('Hapus data ini?')" title="Hapus">
                <i class="lni lni-trash-can"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-4">
    {{ $kegiatans->links() }}
  </div>
</div>
                    </div>
                  </div>
                </div>
                </div>
          </div>
        </section>

      <footer class="footer">
        <div class="container-fluid">
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