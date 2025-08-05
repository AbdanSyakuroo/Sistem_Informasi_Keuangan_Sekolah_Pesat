{{-- <x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Daftar Kegiatan</h1>
            <a href="{{ route('kegiatans.create') }}" 
               class="bg-blue-500 text-black px-4 py-2 rounded">Tambah</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Kode</th>
                    <th class="px-4 py-2">Nama Kegiatan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $key => $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $kegiatans->firstItem() + $key }}</td>
                        <td class="px-4 py-2">{{ $item->kode_kegiatan }}</td>
                        <td class="px-4 py-2">{{ $item->nama_kegiatan }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('kegiatans.edit', $item->id) }}" 
                               class="text-blue-600">Edit</a>
                            <form action="{{ route('kegiatans.destroy', $item->id) }}" 
                                  method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 ml-2" 
                                        onclick="return confirm('Hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $kegiatans->links() }}
        </div>
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
                  <h2>Title</h2>
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
                      <li class="breadcrumb-item active" aria-current="page">
                        Page
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>


              <div class="tables-wrapper">
           <div class="row">
  <div class="col-lg-12">
    <div class="card-style mb-30">
      <h6 class="mb-10">Data Table</h6>
      <p class="text-sm mb-20">
        Daftar kegiatan yang tersedia dalam database.
      </p>
      <div class="table-wrapper table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><h6>#</h6></th>
              <th><h6>Kode Kegiatan</h6></th>
              <th><h6>Nama Kegiatan</h6></th>
              <th><h6>Aksi</h6></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kegiatans as $key => $item)
            <tr>
              <td>
                <p>{{ $kegiatans->firstItem() + $key }}</p>
              </td>
              <td class="min-width">
                <p>{{ $item->kode_kegiatan }}</p>
              </td>
              <td class="min-width">
                <p>{{ $item->nama_kegiatan }}</p>
              </td>
              <td class="min-width">
                <div class="action flex gap-2">
                  <a href="{{ route('kegiatans.edit', $item->id) }}" class="text-primary">
                    <i class="lni lni-pencil"></i>
                  </a>
                  <form action="{{ route('kegiatans.destroy', $item->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-danger" onclick="return confirm('Hapus data ini?')">
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
          {{ $kegiatans->links() }}
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

