<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/pesat.png" type="image/x-icon" />
    <title>Laporan Keseluruhan</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <style>
        /* Menargetkan semua sel data (td) dan header (th) di tabel laporan */
        #laporanTable th,
        #laporanTable td {
            padding: 0.75rem 1rem;
            white-space: nowrap;
        }

        /* Padding khusus untuk kolom tanggal */
        #laporanTable th:first-child,
        #laporanTable td:first-child {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            font-weight: 500;
        }

        /* Meningkatkan jarak antar batas sel */
        #laporanTable {
            border-collapse: separate;
            border-spacing: 0 0.25rem;
        }
        
        /* Responsif untuk tabel - layar medium dan kecil */
        @media (max-width: 992px) {
            #laporanTable th,
            #laporanTable td {
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
            }
            
            /* Padding khusus untuk kolom tanggal pada layar medium */
            #laporanTable th:first-child,
            #laporanTable td:first-child {
                padding-left: 1rem;
                padding-right: 1rem;
                font-size: 0.9rem;
            }
            
            .table-responsive {
                font-size: 0.875rem;
                margin: 0 -15px;
                width: calc(100% + 30px);
            }
            
            .card-style {
                padding: 1.25rem;
            }
        }
        
        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            #laporanTable th,
            #laporanTable td {
                padding: 0.4rem 0.5rem;
                font-size: 0.8rem;
                white-space: normal;
            }
            
            /* Padding khusus untuk kolom tanggal pada layar kecil */
            #laporanTable th:first-child,
            #laporanTable td:first-child {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
                font-size: 0.9rem;
                min-width: 90px;
                white-space: nowrap;
            }
            
            #laporanTable th.text-nowrap,
            #laporanTable td.text-nowrap {
                white-space: nowrap;
            }
            
            /* Perbaikan untuk kolom nominal pada layar kecil */
            #laporanTable .nominal-cell {
                white-space: nowrap;
                min-width: 120px;
                text-align: right;
            }
            
            .table-responsive {
                font-size: 0.8rem;
                margin: 0 -15px;
                width: calc(100% + 30px);
                border-radius: 0;
            }
            
            .card-style {
                padding: 1rem;
                margin-bottom: 1.5rem;
            }
            
            .section {
                padding: 1.5rem 0;
            }
            
            /* Perbaikan untuk tombol filter dan export pada layar kecil */
            .filter-form .col-auto {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            
            .filter-form button,
            .export-buttons button {
                width: 100%;
                height: 38px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .export-buttons {
                width: 100%;
                margin-top: 0.5rem;
            }
            
            .export-buttons button {
                margin-bottom: 0.5rem;
            }
            
            .export-buttons button:last-child {
                margin-bottom: 0;
            }
        }
        
        /* Responsif untuk layar sangat kecil (mobile) */
        @media (max-width: 576px) {
            /* Format tanggal yang lebih pendek */
            .date-short {
                display: block;
            }
            
            /* Meningkatkan ukuran font untuk tanggal */
            #laporanTable th:first-child,
            #laporanTable td:first-child {
                font-size: 0.95rem;
                min-width: 80px;
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
            
            /* Mengurangi padding tabel secara keseluruhan */
            #laporanTable th,
            #laporanTable td {
                padding: 0.3rem 0.4rem;
            }
            
            /* Perbaikan untuk kolom nominal pada layar sangat kecil */
            #laporanTable .nominal-cell {
                min-width: 100px;
                font-size: 0.75rem;
                padding: 0.2rem 0.3rem;
            }
            
            /* Membuat kolom tanggal lebih menonjol */
            #laporanTable td:first-child {
                font-weight: 600;
                color: #0d6efd;
            }
            
            /* Mengganti tag p menjadi span untuk kolom nominal */
            .nominal-cell span {
                display: inline;
                font-weight: 600;
            }
        }
        
        /* Responsif untuk form filter */
        @media (max-width: 992px) {
            .filter-form {
                width: 100%;
                margin-bottom: 1rem;
            }
            
            .filter-form .col-auto {
                flex: 0 0 auto;
                width: auto;
                max-width: 100%;
            }
        }
        
        /* Responsif untuk tombol export */
        @media (max-width: 992px) {
            .export-buttons {
                width: 100%;
                justify-content: flex-end;
            }
        }
        
        /* Responsif untuk judul dan breadcrumb */
        @media (max-width: 768px) {
            .title-wrapper {
                padding-bottom: 1rem;
            }
            
            .title h2 {
                font-size: 1.5rem;
            }
            
            .breadcrumb {
                padding: 0.5rem 0;
            }
        }
        
        /* Perbaikan untuk tabel yang terlalu lebar */
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        /* Perbaikan untuk card pada layar kecil */
        @media (max-width: 768px) {
            .card-style {
                border-radius: 0;
                border-left: none;
                border-right: none;
            }
        }
    </style>
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
                <div class="title-wrapper pt-30 mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-3 mb-md-0">
                                <h2>Laporan</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb flex-wrap">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item {{ request()->is('laporan') ? 'active' : '' }}"
                                            @if (request()->is('laporan')) aria-current="page" @endif>
                                            @if (request()->is('laporan'))
                                                Laporan
                                            @else
                                                <a href="{{ url('/laporan') }}">Laporan</a>
                                            @endif
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========== title-wrapper end ========== -->

                <div class="tables-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-style mb-30">
                                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4">
                                    <form method="GET" action="{{ url('/laporan') }}" class="filter-form row g-3 mb-3 mb-lg-0">
                                        <div class="col-auto">
                                            <label for="bulan" class="form-label">Bulan</label>
                                            <select name="bulan" id="bulan" class="form-select">
                                                <option value="">-- Semua --</option>
                                                @foreach (range(1, 12) as $m)
                                                    <option value="{{ $m }}"
                                                        {{ request('bulan') == $m ? 'selected' : '' }}>
                                                        {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <label for="tahun" class="form-label">Tahun</label>
                                            <select name="tahun" id="tahun" class="form-select">
                                                <option value="">-- Semua --</option>
                                                @foreach (range(date('Y'), date('Y') - 5) as $y)
                                                    <option value="{{ $y }}"
                                                        {{ request('tahun') == $y ? 'selected' : '' }}>
                                                        {{ $y }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-auto align-self-end">
                                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                                        </div>
                                    </form>

                                    <!-- Tombol Export -->
                                    <div class="export-buttons d-flex flex-lg-row flex-column">
                                        <button id="exportPDF" class="btn btn-danger mb-2 mb-lg-0 me-lg-2">Cetak PDF</button>
                                        <button id="exportExcel" class="btn btn-success">Export Excel</button>
                                    </div>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success mb-3">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="table-wrapper table-responsive">
                                    <table class="table table-striped table-hover align-middle" id="laporanTable">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">Tanggal</th>
                                                <th class="text-nowrap">Uraian</th>
                                                <th class="text-nowrap">Kode Kegiatan</th>
                                                <th class="text-nowrap">Nama Sumber</th>
                                                <th class="text-nowrap text-end">Penerimaan</th>
                                                <th class="text-nowrap text-end">Pengeluaran</th>
                                                <th class="text-nowrap text-end">Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laporan as $row)
                                                <tr>
                                                    <td>
                                                        <!-- Format tanggal panjang (default) -->
                                                        <span class="date-short">{{ \Carbon\Carbon::parse($row->tanggal)->format('d/m/y') }}</span>
                                                    </td>
                                                    <td>{{ $row->uraian }}</td>
                                                    <td>{{ $row->kode_kegiatan }}</td>
                                                    <td>{{ $row->nama_sumber }}</td>
                                                    <td class="text-end nominal-cell">
                                                        <span>Rp {{ number_format($row->penerimaan, 0, ',', '.') }}</span>
                                                    </td>
                                                    <td class="text-end nominal-cell">
                                                        <span>Rp {{ number_format($row->pengeluaran, 0, ',', ',') }}</span>
                                                    </td>
                                                    <td class="text-end nominal-cell">
                                                        <span>Rp {{ number_format($row->saldo, 0, ',', ',') }}</span>
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
            </div>
            <!-- end container -->
        </section>
        <!-- ========== footer start ========== -->
        <footer>
            <!-- Footer content here -->
        </footer>
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->


    <!-- Library jsPDF & AutoTable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

    <!-- Library SheetJS untuk Export Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        const bulanMap = {
            "01": "Januari",
            "02": "Februari",
            "03": "Maret",
            "04": "April",
            "05": "Mei",
            "06": "Juni",
            "07": "Juli",
            "08": "Agustus",
            "09": "September",
            "10": "Oktober",
            "11": "November",
            "12": "Desember"
        };

        // Ambil nilai dari blade
        const rawBulan = "{{ $bulan }}";
        const rawTahun = "{{ $tahun }}";

        // Tentukan label periode
        let periode = 'Semua Periode';
        if (rawBulan && rawTahun) {
            periode = `${bulanMap[rawBulan] ?? rawBulan} ${rawTahun}`;
        } else if (rawTahun) {
            periode = `Semua Bulan ${rawTahun}`;
        }

        // Data JSON dari blade
        const kegiatan = @json($kegiatan);
        const realisasi = @json($realisasi);
        const sumberDanas = @json($sumberDanas);
        const realisasiKegiatan = @json($realisasiKegiatan);

        function formatRupiah(angka) {
            return 'Rp ' + parseInt(angka, 10).toLocaleString('id-ID');
        }

        document.getElementById('exportPDF').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            const rows = Array.from(document.querySelectorAll('#laporanTable tbody tr'))
                .map(tr => Array.from(tr.children).map((td, i) => {
                    if ([2, 3, 6].includes(i)) {
                        const val = parseInt(td.innerText.replace(/[^0-9\-]+/g, ""), 10) || 0;
                        return val;
                    }
                    return td.innerText.trim();
                }));

            // === 1. Laporan Keseluruhan ===
            doc.text(`Laporan Keseluruhan - ${periode}`, 14, 10);
            doc.autoTable({
                head: [
                    ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber',
                        'Saldo'
                    ]
                ],
                body: rows.map(r => [r[0], r[1], formatRupiah(r[2]), formatRupiah(r[3]), r[4], r[5],
                    formatRupiah(r[6])
                ]),
                startY: 20
            });

            // === 2. Daftar Kegiatan ===
            if (kegiatan.length > 0) {
                doc.addPage();
                doc.text(`Daftar Kegiatan - ${periode}`, 14, 10);
                doc.autoTable({
                    head: [
                        ['Kode Kegiatan', 'Nama Kegiatan']
                    ],
                    body: kegiatan.map(k => [k.kode_kegiatan, k.nama_kegiatan]),
                    startY: 20
                });
            }

            // === 3. Data Penerimaan ===
            const penerimaanRows = rows.filter(r => r[2] > 0);
            if (penerimaanRows.length > 0) {
                const totalPenerimaan = penerimaanRows.reduce((sum, r) => sum + r[2], 0);
                doc.addPage();
                doc.text(`Laporan Penerimaan - ${periode}`, 14, 10);
                doc.autoTable({
                    head: [
                        ['Tanggal', 'Uraian', 'Penerimaan']
                    ],
                    body: [
                        ...penerimaanRows.map(r => [r[0], r[1], formatRupiah(r[2])]),
                        [{
                            content: "TOTAL",
                            colSpan: 2,
                            styles: {
                                halign: 'right'
                            }
                        }, formatRupiah(totalPenerimaan)]
                    ],
                    startY: 20
                });
            }

            // === 4. Data Pengeluaran ===
            const pengeluaranRows = rows.filter(r => r[3] > 0);
            if (pengeluaranRows.length > 0) {
                const totalPengeluaran = pengeluaranRows.reduce((sum, r) => sum + r[3], 0);
                doc.addPage();
                doc.text(`Laporan Pengeluaran - ${periode}`, 14, 10);
                doc.autoTable({
                    head: [
                        ['Tanggal', 'Uraian', 'Kode Kegiatan', 'Nama Sumber', 'Pengeluaran']
                    ],
                    body: [
                        ...pengeluaranRows.map(r => [r[0], r[1], r[4], r[5], formatRupiah(r[3])]),
                        [{
                            content: "TOTAL",
                            colSpan: 4,
                            styles: {
                                halign: 'right'
                            }
                        }, formatRupiah(totalPengeluaran)]
                    ],
                    startY: 20
                });
            }

            // === 5. Data Pengeluaran per Sumber Dana ===
            const groupedPengeluaran = {};
            pengeluaranRows.forEach(row => {
                const sumber = row[5] || 'Tanpa Sumber';
                if (!groupedPengeluaran[sumber]) groupedPengeluaran[sumber] = [];
                groupedPengeluaran[sumber].push(row);
            });

            for (const sumber in groupedPengeluaran) {
                const totalSumber = groupedPengeluaran[sumber].reduce((sum, r) => sum + r[3], 0);
                doc.addPage();
                doc.text(`Laporan Pengeluaran ${sumber} - ${periode}`, 14, 10);
                doc.autoTable({
                    head: [
                        ['Tanggal', 'Uraian', 'Kode Kegiatan', 'Nama Sumber', 'Pengeluaran']
                    ],
                    body: [
                        ...groupedPengeluaran[sumber].map(r => [r[0], r[1], r[4], r[5], formatRupiah(r[
                            3])]),
                        [{
                            content: "TOTAL",
                            colSpan: 4,
                            styles: {
                                halign: 'right'
                            }
                        }, formatRupiah(totalSumber)]
                    ],
                    startY: 20
                });
            }

            // === 6. Realisasi per Sumber Dana ===
            if (realisasi.length > 0) {
                const realisasiBody = realisasi.map((r, i) => [
                    i + 1, r.nama_sumber,
                    formatRupiah(r.total_penerimaan),
                    formatRupiah(r.total_pengeluaran),
                    formatRupiah(r.saldo)
                ]);

                doc.addPage();
                doc.text(`Laporan Realisasi Sumber Dana - ${periode}`, 14, 10);
                doc.autoTable({
                    head: [
                        ['No', 'Nama Sumber', 'Total Penerimaan', 'Total Pengeluaran', 'Sisa Saldo']
                    ],
                    body: realisasiBody,
                    startY: 20
                });
            }

            // === 7. Realisasi per Kegiatan (Matrix) ===
            if (Array.isArray(realisasiKegiatan) && realisasiKegiatan.length > 0) {
                const head = [
                    ['Kode Kegiatan', 'Nama Kegiatan', ...sumberDanas, 'Total']
                ];
                const body = realisasiKegiatan.map(r => {
                    let total = 0;
                    const row = [r.kode_kegiatan ?? '', r.nama_kegiatan ?? ''];
                    sumberDanas.forEach(sumber => {
                        const num = Number(r[sumber]) || 0;
                        total += num;
                        row.push(formatRupiah(num));
                    });
                    row.push(formatRupiah(total));
                    return row;
                });

                doc.addPage();
                doc.text(`Realisasi per Kegiatan - ${periode}`, 14, 10);
                doc.autoTable({
                    head,
                    body,
                    startY: 20
                });
            }

            doc.save('Laporan Keuangan.pdf');
        });

        // ======================= EXCEL =======================
        document.getElementById('exportExcel').addEventListener('click', function() {
            const wb = XLSX.utils.book_new();

            const rows = Array.from(document.querySelectorAll('#laporanTable tbody tr'))
                .map(tr => Array.from(tr.children).map((td, i) => {
                    if ([2, 3, 6].includes(i)) {
                        const val = parseInt(td.innerText.replace(/[^0-9\-]+/g, ""), 10) || 0;
                        return val;
                    }
                    return td.innerText.trim();
                }));

            // 1. Keseluruhan
            const wsAll = XLSX.utils.aoa_to_sheet([
                [`Laporan Keseluruhan - ${periode}`],
                [],
                ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo'],
                ...rows.map(r => [r[0], r[1], formatRupiah(r[2]), formatRupiah(r[3]), r[4], r[5],
                    formatRupiah(r[6])
                ])
            ]);
            wsAll['!merges'] = [{
                s: {
                    r: 0,
                    c: 0
                },
                e: {
                    r: 0,
                    c: 6
                }
            }];
            XLSX.utils.book_append_sheet(wb, wsAll, 'Keseluruhan');

            // 2. Kegiatan
            if (kegiatan.length > 0) {
                const wsKegiatan = XLSX.utils.aoa_to_sheet([
                    [`Daftar Kegiatan - ${periode}`],
                    [],
                    ['Kode Kegiatan', 'Nama Kegiatan'],
                    ...kegiatan.map(k => [k.kode_kegiatan, k.nama_kegiatan])
                ]);
                wsKegiatan['!merges'] = [{
                    s: {
                        r: 0,
                        c: 0
                    },
                    e: {
                        r: 0,
                        c: 1
                    }
                }];
                XLSX.utils.book_append_sheet(wb, wsKegiatan, 'Kegiatan');
            }

            // 3. Penerimaan
            const penerimaanRows = rows.filter(r => r[2] > 0);
            if (penerimaanRows.length > 0) {
                const totalPenerimaan = penerimaanRows.reduce((sum, r) => sum + r[2], 0);
                const wsPenerimaan = XLSX.utils.aoa_to_sheet([
                    [`Laporan Penerimaan - ${periode}`],
                    [],
                    ['Tanggal', 'Uraian', 'Penerimaan'],
                    ...penerimaanRows.map(r => [r[0], r[1], formatRupiah(r[2])]),
                    ['TOTAL', '', formatRupiah(totalPenerimaan)]
                ]);
                wsPenerimaan['!merges'] = [{
                    s: {
                        r: 0,
                        c: 0
                    },
                    e: {
                        r: 0,
                        c: 2
                    }
                }];
                XLSX.utils.book_append_sheet(wb, wsPenerimaan, 'Penerimaan');
            }

            // 4. Pengeluaran
            const pengeluaranRows = rows.filter(r => r[3] > 0);
            if (pengeluaranRows.length > 0) {
                const totalPengeluaran = pengeluaranRows.reduce((sum, r) => sum + r[3], 0);
                const wsPengeluaran = XLSX.utils.aoa_to_sheet([
                    [`Laporan Pengeluaran - ${periode}`],
                    [],
                    ['Tanggal', 'Uraian', 'Kode Kegiatan', 'Nama Sumber', 'Pengeluaran'],
                    ...pengeluaranRows.map(r => [r[0], r[1], r[4], r[5], formatRupiah(r[3])]),
                    ['TOTAL', '', '', '', formatRupiah(totalPengeluaran)]
                ]);
                wsPengeluaran['!merges'] = [{
                    s: {
                        r: 0,
                        c: 0
                    },
                    e: {
                        r: 0,
                        c: 4
                    }
                }];
                XLSX.utils.book_append_sheet(wb, wsPengeluaran, 'Pengeluaran');
            }

            // 5. Pengeluaran per Sumber Dana
            const groupedPengeluaran = {};
            pengeluaranRows.forEach(row => {
                const sumber = row[5] || 'Tanpa Sumber';
                if (!groupedPengeluaran[sumber]) groupedPengeluaran[sumber] = [];
                groupedPengeluaran[sumber].push(row);
            });

            for (const sumber in groupedPengeluaran) {
                const totalSumber = groupedPengeluaran[sumber].reduce((sum, r) => sum + r[3], 0);
                const ws = XLSX.utils.aoa_to_sheet([
                    [`Laporan Pengeluaran ${sumber} - ${periode}`],
                    [],
                    ['Tanggal', 'Uraian', 'Kode Kegiatan', 'Nama Sumber', 'Pengeluaran'],
                    ...groupedPengeluaran[sumber].map(r => [r[0], r[1], r[4], r[5], formatRupiah(r[3])]),
                    ['TOTAL', '', '', '', formatRupiah(totalSumber)]
                ]);
                ws['!merges'] = [{
                    s: {
                        r: 0,
                        c: 0
                    },
                    e: {
                        r: 0,
                        c: 4
                    }
                }];
                XLSX.utils.book_append_sheet(wb, ws, `Pengeluaran ${sumber}`.substring(0, 31));
            }

            // 6. Realisasi per Sumber Dana
            const wsRealisasi = XLSX.utils.aoa_to_sheet([
                [`Laporan Realisasi Sumber Dana - ${periode}`],
                [],
                ['No', 'Nama Sumber', 'Total Penerimaan', 'Total Pengeluaran', 'Sisa Saldo'],
                ...realisasi.map((r, i) => [
                    i + 1, r.nama_sumber,
                    formatRupiah(r.total_penerimaan),
                    formatRupiah(r.total_pengeluaran),
                    formatRupiah(r.saldo)
                ])
            ]);
            wsRealisasi['!merges'] = [{
                s: {
                    r: 0,
                    c: 0
                },
                e: {
                    r: 0,
                    c: 4
                }
            }];
            XLSX.utils.book_append_sheet(wb, wsRealisasi, 'Realisasi Sumber Dana');

            // 7. Realisasi Matrix
            if (Array.isArray(realisasiKegiatan) && realisasiKegiatan.length > 0) {
                const header = ['Kode Kegiatan', 'Nama Kegiatan', ...sumberDanas, 'Total'];
                const rowsMatrix = realisasiKegiatan.map(r => {
                    let total = 0;
                    const vals = [];
                    sumberDanas.forEach(sumber => {
                        const num = Number(r[sumber]) || 0;
                        vals.push(num);
                        total += num;
                    });
                    return [r.kode_kegiatan ?? '', r.nama_kegiatan ?? '', ...vals, total];
                });

                const wsMatrix = XLSX.utils.aoa_to_sheet([
                    [`Realisasi per Kegiatan - ${periode}`],
                    [],
                    header, ...rowsMatrix
                ]);
                wsMatrix['!merges'] = [{
                    s: {
                        r: 0,
                        c: 0
                    },
                    e: {
                        r: 0,
                        c: header.length - 1
                    }
                }];
                XLSX.utils.book_append_sheet(wb, wsMatrix, 'Realisasi Kegiatan');
            }

            XLSX.writeFile(wb, 'laporan.xlsx');
        });
    </script>

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


