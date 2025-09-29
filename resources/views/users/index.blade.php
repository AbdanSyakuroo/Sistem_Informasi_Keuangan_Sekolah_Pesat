<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Manajemen User | Admin Panel</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
        /* Custom CSS for responsiveness */
        @media (max-width: 767.98px) {
            .table-responsive.card-list .table {
                display: block;
                width: 100%;
                overflow-x: auto;
            }

            .table-responsive.card-list thead {
                display: none;
            }

            .table-responsive.card-list tbody,
            .table-responsive.card-list tr {
                display: block;
            }

            .table-responsive.card-list td {
                display: block;
                text-align: right !important;
                padding-left: 50% !important;
                position: relative;
            }

            .table-responsive.card-list td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: calc(50% - 30px);
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }

            .table-responsive.card-list .action-buttons {
                text-align: center;
                margin-top: 10px;
            }

            .title-wrapper .title h2,
            .title-wrapper .title p {
                text-align: center;
            }

            .breadcrumb-wrapper {
                text-align: center;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                align-items: center;
            }

            .d-flex.justify-content-between .btn {
                width: 100%;
                margin-top: 10px;
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
                {{-- Bagian Header Halaman --}}
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
                {{-- Bagian Konten Utama (Daftar User) --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            {{-- Card Header (Judul dan Tombol) --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 text-bold">Daftar User</h6>
                                {{-- Tombol Tambah User Baru --}}
                                <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm text-white">
                                    <i data-lucide="plus-circle" class="me-1" style="width:16px; height:16px;"></i>
                                    Tambah User Baru
                                </a>
                            </div>

                            {{-- Tabel Daftar User --}}
                            <div class="table-wrapper table-responsive card-list">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <h6>No.</h6>
                                            </th>
                                            <th>
                                                <h6>Nama Lengkap</h6>
                                            </th>
                                            <th>
                                                <h6>Email</h6>
                                            </th>
                                            <th class="text-center">
                                                <h6>Aksi</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td class="text-center" data-label="No.">
                                                    <p>{{ $key + 1 }}</p>
                                                </td>
                                                <td data-label="Nama Lengkap">
                                                    <p>{{ $user->name }}</p>
                                                </td>
                                                <td data-label="Email">
                                                    <p>{{ $user->email }}</p>
                                                </td>
                                                <td class="text-center" data-label="Aksi">
                                                    <div class="action-buttons">
                                                        {{-- Tombol Edit --}}
                                                        <a href="{{ url('users/' . $user->id . '/edit') }}"
                                                            class="btn btn-warning btn-sm me-1" title="Edit">
                                                            <i data-lucide="pencil" style="width: 14px; height: 14px;"></i>
                                                        </a>
                                                        {{-- Tombol Hapus --}}
                                                        <form action="{{ url('users/' . $user->id) }}" method="POST"
                                                            class="d-inline"
                                                            onsubmit="return confirm('Anda yakin ingin menghapus user ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Hapus">
                                                                <i data-lucide="trash-2"
                                                                    style="width: 14px; height: 14px;"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>