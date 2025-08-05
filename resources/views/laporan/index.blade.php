{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4">Laporan Keuangan</h1>

        <table class="min-w-full border border-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Kode Kegiatan</th>
                    <th class="px-4 py-2 border">Sumber Dana</th>
                    <th class="px-4 py-2 border">Uraian</th>
                    <th class="px-4 py-2 border">Penerimaan</th>
                    <th class="px-4 py-2 border">Pengeluaran</th>
                    <th class="px-4 py-2 border">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $index => $item)
                    <tr class="border-b">
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border text-center">{{ $item->tanggal }}</td>
                        <td class="px-4 py-2 border text-center">{{ $item->kode_kegiatan ?? '-' }}</td>
                        <td class="px-4 py-2 border text-center">{{ $item->nama_sumber ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $item->uraian }}</td>
                        <td class="px-4 py-2 border text-right text-green-600">
                            {{ $item->penerimaan ? 'Rp ' . number_format($item->penerimaan, 0, ',', '.') : '-' }}
                        </td>
                        <td class="px-4 py-2 border text-right text-red-600">
                            {{ $item->pengeluaran ? 'Rp ' . number_format($item->pengeluaran, 0, ',', '.') : '-' }}
                        </td>
                        <td class="px-4 py-2 border text-right font-bold">
                            Rp {{ number_format($item->saldo, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout> --}}
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
                  <h2>Laporan</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item {{ request()->is('laporan') ? 'active' : '' }}" 
    @if(request()->is('laporan')) aria-current="page" @endif>
    @if(request()->is('laporan'))
        Laporan
    @else
        <a href="{{ url('/laporan') }}">Laporan</a>
    @endif
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
          <h6 class="mb-0">Laporan</h6>
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
                <th><h6>Kode Kegiatan</h6></th>
                <th><h6>Sumber Dana</h6></th>
                <th><h6>Uraian</h6></th>
                <th><h6>Penerimaan</h6></th>
                <th><h6>Pengeluaran</h6></th>
                <th><h6>Saldo</h6></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($laporan as $index => $item)
                <tr>
                  <td><p>{{ $index + 1 }}</p></td>
                  <td><p>{{ $item->tanggal }}</p></td>
                  <td><p>{{ $item->kode_kegiatan ?? '-'  }}</p></td>
                  <td><p>{{ $item->nama_sumber ?? '-'  }}</p></td>
                  <td><p>{{ $item->uraian }}</p></td>
                  <td><p>{{ $item->penerimaan ? 'Rp ' . number_format($item->penerimaan, 0, ',', '.') : '-' }}</p></td>
                  <td><p>{{ $item->pengeluaran ? 'Rp ' . number_format($item->pengeluaran, 0, ',', '.') : '-' }}</p></td>
                  <td><p>Rp {{ number_format($item->saldo, 0, ',', '.') }}</p></td>
                    
                </tr>
              @endforeach
            </tbody>
          </table>
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