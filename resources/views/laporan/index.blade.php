<x-app-layout>
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
</x-app-layout>
