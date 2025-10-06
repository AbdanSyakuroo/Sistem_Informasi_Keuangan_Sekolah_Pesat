<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Tambah Penerimaan Sumber Dana</title>

    <!-- CSS PlainAdmin -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
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
                                <h2>Tambah Penerimaan Sumber Dana</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('penerimaan-sumber-dana.index') }}">Penerimaan Sumber
                                                Dana</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Tambah
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========== title-wrapper end ========== -->

                <!-- ========== form start ========== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h6 class="mb-3">Form Tambah Penerimaan</h6>

                            <form action="{{ route('penerimaan-sumber-dana.store') }}" method="POST">
                                @csrf

                                <!-- Sumber Dana -->
                                <div class="mb-3">
                                    <label for="sumber_dana_id" class="form-label">Sumber Dana</label>
                                    <select name="sumber_dana_id" id="sumber_dana_id" class="form-select" required>
                                        <option value="">-- Pilih Sumber Dana --</option>
                                        @foreach ($sumberDanas as $sd)
                                            <option value="{{ $sd->id }}">{{ $sd->nama_sumber }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                </div>

                                <!-- Uraian -->
                                <div class="mb-3">
                                    <label for="uraian" class="form-label">Uraian</label>
                                    <input type="text" name="uraian" id="uraian" class="form-control"
                                        placeholder="Contoh: Donasi rutin bulan Juli">
                                </div>

                                <!-- Nominal -->
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="number" name="nominal" id="nominal" class="form-control"
                                        placeholder="Masukkan jumlah (Rp)" required>
                                </div>

                                <!-- Tombol -->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('penerimaan-sumber-dana.index') }}"
                                        class="btn btn-secondary me-2">Batal</a>
                                    <button type="submit" id="simpanBtn" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ========== form end ========== -->
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

    <!-- JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('assets/js/polyfill.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        document.getElementById("simpanBtn").addEventListener("click", function() {
            this.disabled = true;
            this.innerText = "Memproses..."; // optional
            this.form.submit();
        });
    </script>
</body>

</html>
