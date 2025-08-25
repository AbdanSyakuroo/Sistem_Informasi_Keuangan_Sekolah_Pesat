
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


              <div class="tables-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <form method="GET" action="{{ url('/laporan') }}" class="row g-3 mb-3">
    <div class="col-auto">
        <label for="bulan" class="form-label">Bulan</label>
        <select name="bulan" id="bulan" class="form-select">
            <option value="">-- Semua --</option>
            @foreach(range(1, 12) as $m)
                <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                    {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-auto">
        <label for="tahun" class="form-label">Tahun</label>
        <select name="tahun" id="tahun" class="form-select">
            <option value="">-- Semua --</option>
            @foreach(range(date('Y'), date('Y') - 5) as $y)
                <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
                    {{ $y }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-auto align-self-end">
        <button type="submit" class="btn btn-primary">Filter</button>
    </div>
</form>

            <!-- Tombol Export -->
  <div style="margin: 15px 0;">
            <button id="exportPDF" class="btn btn-danger mb-3">Cetak PDF</button>
        <button id="exportExcel" class="btn btn-success mb-3">Export Excel</button>
  </div>
          </div>

          @if (session('success'))
            <div class="alert alert-success mb-3">
              {{ session('success') }}
            </div>
          @endif

          <div class="table-wrapper table-responsive">
            <table class="table" id="laporanTable">
              <thead>
                <tr>
                  <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Penerimaan</th>
                    <th>Pengeluaran</th>
                    <th>Kode Kegiatan</th>
                    <th>Nama Sumber</th>
                    <th>Saldo</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($laporan as $row)
                    <tr>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->uraian }}</td>
                        <td>Rp {{ number_format($row->penerimaan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($row->pengeluaran,0 ,',',',') }}</td>
                        <td>{{ $row->kode_kegiatan }}</td>
                        <td>{{ $row->nama_sumber }}</td>
                        <td>Rp {{ number_format($row->saldo,0,',',',') }}</td>
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


  <!-- Library jsPDF & AutoTable -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

  <!-- Library SheetJS untuk Export Excel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
 const kegiatan = @json($kegiatan);

function formatRupiah(angka) {
    return 'Rp ' + parseInt(angka, 10).toLocaleString('id-ID');
}

document.getElementById('exportPDF').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
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
    doc.text("Laporan Keseluruhan", 14, 10);
    doc.autoTable({
        head: [['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo']],
        body: rows.map(r => [r[0], r[1], formatRupiah(r[2]), formatRupiah(r[3]), r[4], r[5], formatRupiah(r[6])]),
        startY: 20
    });

    // === 2. Daftar Kegiatan ===
    if (kegiatan.length > 0) {
        doc.addPage();
        doc.text("Daftar Kegiatan", 14, 10);
        doc.autoTable({
            head: [['Kode Kegiatan', 'Nama Kegiatan']],
            body: kegiatan.map(k => [k.kode_kegiatan, k.nama_kegiatan]),
            startY: 20
        });
    }

    // === 3. Data Penerimaan ===
    const penerimaanRows = rows.filter(r => r[2] > 0);
    if (penerimaanRows.length > 0) {
        const totalPenerimaan = penerimaanRows.reduce((sum, r) => sum + r[2], 0);
        doc.addPage();
        doc.text("Laporan Penerimaan", 14, 10);
        doc.autoTable({
            head: [['Tanggal', 'Uraian', 'Penerimaan']],
            body: [
                ...penerimaanRows.map(r => [r[0], r[1], formatRupiah(r[2])]),
                [{ content: "TOTAL", colSpan: 2, styles: { halign: 'right' } }, formatRupiah(totalPenerimaan)]
            ],
            startY: 20
        });
    }

    // === 4. Data Pengeluaran ===
    const pengeluaranRows = rows.filter(r => r[3] > 0);
    if (pengeluaranRows.length > 0) {
        const totalPengeluaran = pengeluaranRows.reduce((sum, r) => sum + r[3], 0);
        doc.addPage();
        doc.text("Laporan Pengeluaran", 14, 10);
        doc.autoTable({
            head: [['Tanggal', 'Uraian', 'Kode Kegiatan', 'Nama Sumber', 'Pengeluaran']],
            body: [
                ...pengeluaranRows.map(r => [r[0], r[1], r[4], r[5], formatRupiah(r[3])]),
                [{ content: "TOTAL", colSpan: 4, styles: { halign: 'right' } }, formatRupiah(totalPengeluaran)]
            ],
            startY: 20
        });
    }

    // === 5. Data Pengeluaran per Sumber Dana ===
    const grouped = {};
    pengeluaranRows.forEach(row => {
        const sumber = row[5] || 'Tanpa Sumber';
        if (!grouped[sumber]) grouped[sumber] = [];
        grouped[sumber].push(row);
    });

    for (const sumber in grouped) {
        const totalSumber = grouped[sumber].reduce((sum, r) => sum + r[3], 0);
        doc.addPage();
        doc.text(`Laporan Pengeluaran - ${sumber}`, 14, 10);
        doc.autoTable({
            head: [['Tanggal', 'Uraian', 'Kode Kegiatan', 'Nama Sumber', 'Pengeluaran']],
            body: [
                ...grouped[sumber].map(r => [r[0], r[1], r[4], r[5], formatRupiah(r[3])]),
                [{ content: "TOTAL", colSpan: 4, styles: { halign: 'right' } }, formatRupiah(totalSumber)]
            ],
            startY: 20
        });
    }

    doc.save('laporan.pdf');
});

// ======================= EXCEL =======================
document.getElementById('exportExcel').addEventListener('click', function () {
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
        ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo'],
        ...rows.map(r => [r[0], r[1], formatRupiah(r[2]), formatRupiah(r[3]), r[4], r[5], formatRupiah(r[6])])
    ]);
    XLSX.utils.book_append_sheet(wb, wsAll, 'Keseluruhan');

    // 2. Kegiatan
    if (kegiatan.length > 0) {
        const wsKegiatan = XLSX.utils.aoa_to_sheet([
            ['Kode Kegiatan', 'Nama Kegiatan'],
            ...kegiatan.map(k => [k.kode_kegiatan, k.nama_kegiatan])
        ]);
        XLSX.utils.book_append_sheet(wb, wsKegiatan, 'Kegiatan');
    }

    // 3. Penerimaan
    const penerimaanRows = rows.filter(r => r[2] > 0);
    if (penerimaanRows.length > 0) {
        const totalPenerimaan = penerimaanRows.reduce((sum, r) => sum + r[2], 0);
        const wsPenerimaan = XLSX.utils.aoa_to_sheet([
            ['Tanggal', 'Uraian', 'Penerimaan'],
            ...penerimaanRows.map(r => [r[0], r[1], formatRupiah(r[2])]),
            ['TOTAL', '', formatRupiah(totalPenerimaan)]
        ]);
        XLSX.utils.book_append_sheet(wb, wsPenerimaan, 'Penerimaan');
    }

    // 4. Pengeluaran
    const pengeluaranRows = rows.filter(r => r[3] > 0);
    if (pengeluaranRows.length > 0) {
        const totalPengeluaran = pengeluaranRows.reduce((sum, r) => sum + r[3], 0);
        const wsPengeluaran = XLSX.utils.aoa_to_sheet([
            ['Tanggal', 'Uraian', 'Kode Kegiatan', 'Nama Sumber', 'Pengeluaran'],
            ...pengeluaranRows.map(r => [r[0], r[1], r[4], r[5], formatRupiah(r[3])]),
            ['TOTAL', '', '', '', formatRupiah(totalPengeluaran)]
        ]);
        XLSX.utils.book_append_sheet(wb, wsPengeluaran, 'Pengeluaran');
    }

    // 5. Pengeluaran per Sumber Dana
    const grouped = {};
    pengeluaranRows.forEach(row => {
        const sumber = row[5] || 'Tanpa Sumber';
        if (!grouped[sumber]) grouped[sumber] = [];
        grouped[sumber].push(row);
    });

    for (const sumber in grouped) {
        const totalSumber = grouped[sumber].reduce((sum, r) => sum + r[3], 0);
        const ws = XLSX.utils.aoa_to_sheet([
            ['Tanggal', 'Uraian', 'Kode Kegiatan', 'Nama Sumber', 'Pengeluaran'],
            ...grouped[sumber].map(r => [r[0], r[1], r[4], r[5], formatRupiah(r[3])]),
            ['TOTAL', '', '', '', formatRupiah(totalSumber)]
        ]);
        XLSX.utils.book_append_sheet(wb, ws, `Pengeluaran ${sumber}`.substring(0, 31));
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

{{-- <x-app-layout>
    <div class="container">
        <h3>Laporan Keseluruhan</h3>

        <button id="exportPDF" class="btn btn-danger mb-3">Cetak PDF</button>
        <button id="exportExcel" class="btn btn-success mb-3">Export Excel</button>

        <table id="laporanTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Penerimaan</th>
                    <th>Pengeluaran</th>
                    <th>Kode Kegiatan</th>
                    <th>Nama Sumber</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $row)
                    <tr>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->uraian }}</td>
                        <td>Rp {{ number_format($row->penerimaan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($row->pengeluaran, 0, ',', ',') }}</td>
                        <td>{{ $row->kode_kegiatan }}</td>
                        <td>{{ $row->nama_sumber }}</td>
                        <td>Rp {{ number_format($row->saldo, 0, ',', ',') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        // Fungsi format Rupiah
        function formatRupiah(angka) {
            return 'Rp ' + parseInt(angka, 10).toLocaleString('id-ID');
        }

        document.getElementById('exportPDF').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Ambil angka murni dari tabel
            const rows = Array.from(document.querySelectorAll('#laporanTable tbody tr'))
                .map(tr => Array.from(tr.children).map((td, i) => {
                    if ([2, 3, 6].includes(i)) { // kolom nominal
                        const val = parseInt(td.innerText.replace(/[^0-9\-]+/g, ""), 10) || 0;
                        return formatRupiah(val);
                    }
                    return td.innerText.trim();
                }));

            // Halaman pertama: keseluruhan
            doc.text("Laporan Keseluruhan", 14, 10);
            doc.autoTable({
                head: [
                    ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber',
                        'Saldo'
                    ]
                ],
                body: rows,
                startY: 20
            });

            // Group per sumber dana
            const grouped = {};
            rows.forEach(row => {
                const sumber = row[5] || 'Penerimaan';
                if (!grouped[sumber]) grouped[sumber] = [];
                grouped[sumber].push(row);
            });

            for (const sumber in grouped) {
                doc.addPage();
                doc.text(`Laporan : ${sumber}`, 14, 10);
                doc.autoTable({
                    head: [
                        ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan',
                            'Nama Sumber', 'Saldo'
                        ]
                    ],
                    body: grouped[sumber],
                    startY: 20
                });
            }

            // Halaman terakhir: Pengeluaran
            const pengeluaranRows = rows.filter(r => parseInt(r[3].replace(/[^0-9\-]+/g, ""), 10) > 0);
            if (pengeluaranRows.length > 0) {
                doc.addPage();
                doc.text("Laporan Pengeluaran", 14, 10);
                doc.autoTable({
                    head: [
                        ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan',
                            'Nama Sumber', 'Saldo'
                        ]
                    ],
                    body: pengeluaranRows,
                    startY: 20
                });
            }

            doc.save('laporan.pdf');
        });

        document.getElementById('exportExcel').addEventListener('click', function() {
            const wb = XLSX.utils.book_new();

            const rows = Array.from(document.querySelectorAll('#laporanTable tbody tr'))
                .map(tr => Array.from(tr.children).map((td, i) => {
                    if ([2, 3, 6].includes(i)) {
                        const val = parseInt(td.innerText.replace(/[^0-9\-]+/g, ""), 10) || 0;
                        return formatRupiah(val);
                    }
                    return td.innerText.trim();
                }));

            // Sheet 1: Keseluruhan
            const wsAll = XLSX.utils.aoa_to_sheet([
                ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo'],
                ...rows
            ]);
            XLSX.utils.book_append_sheet(wb, wsAll, 'Keseluruhan');

            // Sheet per sumber dana
            const grouped = {};
            rows.forEach(row => {
                const sumber = row[5] || 'Penerimaan';
                if (!grouped[sumber]) grouped[sumber] = [];
                grouped[sumber].push(row);
            });

            for (const sumber in grouped) {
                const ws = XLSX.utils.aoa_to_sheet([
                    ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber',
                        'Saldo'
                    ],
                    ...grouped[sumber]
                ]);
                XLSX.utils.book_append_sheet(wb, ws, sumber.substring(0, 31));
            }

            // Sheet terakhir: Pengeluaran
            const pengeluaranRows = rows.filter(r => parseInt(r[3].replace(/[^0-9\-]+/g, ""), 10) > 0);
            if (pengeluaranRows.length > 0) {
                const wsPengeluaran = XLSX.utils.aoa_to_sheet([
                    ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber',
                        'Saldo'
                    ],
                    ...pengeluaranRows
                ]);
                XLSX.utils.book_append_sheet(wb, wsPengeluaran, 'Pengeluaran');
            }

            XLSX.writeFile(wb, 'laporan.xlsx');
        });
    </script>


</x-app-layout> --}}
