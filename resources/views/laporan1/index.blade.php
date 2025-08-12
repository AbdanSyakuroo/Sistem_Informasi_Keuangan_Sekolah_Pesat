<x-app-layout>
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
                        <td>Rp {{ number_format($row->pengeluaran,0 ,',',',') }}</td>
                        <td>{{ $row->kode_kegiatan }}</td>
                        <td>{{ $row->nama_sumber }}</td>
                        <td>Rp {{ number_format($row->saldo,0,',',',') }}</td>
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

document.getElementById('exportPDF').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
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
        head: [['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo']],
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
            head: [['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo']],
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
            head: [['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo']],
            body: pengeluaranRows,
            startY: 20
        });
    }

    doc.save('laporan.pdf');
});

document.getElementById('exportExcel').addEventListener('click', function () {
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
            ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo'],
            ...grouped[sumber]
        ]);
        XLSX.utils.book_append_sheet(wb, ws, sumber.substring(0, 31));
    }

    // Sheet terakhir: Pengeluaran
    const pengeluaranRows = rows.filter(r => parseInt(r[3].replace(/[^0-9\-]+/g, ""), 10) > 0);
    if (pengeluaranRows.length > 0) {
        const wsPengeluaran = XLSX.utils.aoa_to_sheet([
            ['Tanggal', 'Uraian', 'Penerimaan', 'Pengeluaran', 'Kode Kegiatan', 'Nama Sumber', 'Saldo'],
            ...pengeluaranRows
        ]);
        XLSX.utils.book_append_sheet(wb, wsPengeluaran, 'Pengeluaran');
    }

    XLSX.writeFile(wb, 'laporan.xlsx');
});
    </script>

    
</x-app-layout>
