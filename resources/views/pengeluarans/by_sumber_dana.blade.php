<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Pengeluaran Berdasarkan Sumber Dana : {{$namaSumber}}</h1>

    {{-- Tombol Aksi --}}
    <div class="mb-4 flex gap-2">
        <button onclick="printTable()" class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-600">
            Cetak PDF
        </button>
        <button onclick="exportToExcel()" class="bg-green-500 text-black px-4 py-2 rounded hover:bg-green-600">
            Export Excel
        </button>
    </div>

    <table id="pengeluaranTable" class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Kegiatan</th>
                <th class="border px-4 py-2">Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengeluaran as $index => $item)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $item->tanggal }}</td>
                <td class="border px-4 py-2">{{ $item->kegiatan->kode_kegiatan }} - {{ $item->kegiatan->nama_kegiatan }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="border px-4 py-2 text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- SheetJS untuk Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- jsPDF untuk PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
{{-- Script Cetak & Export --}}
<script>
function printTable() {
    let printContents = document.getElementById("pengeluaranTable").outerHTML;
    let originalContents = document.body.innerHTML;
    document.body.innerHTML = "<h2>Pengeluaran Berdasarkan Sumber Dana: {{$namaSumber}}</h2>" + printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function exportToExcel() {
    let table = document.getElementById("pengeluaranTable");
    let html = table.outerHTML.replace(/ /g, '%20');

    let link = document.createElement("a");
    link.href = 'data:application/vnd.ms-excel,' + html;
    link.download = 'pengeluaran_{{$namaSumber}}.xls';
    link.click();
}
</script>
</x-app-layout>
