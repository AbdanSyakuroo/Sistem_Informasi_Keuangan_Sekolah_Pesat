<x-app-layout>
<div class="container">
    <h3>Laporan Realisasi Sumber Dana</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sumber Dana</th>
                <th>Total Penerimaan</th>
                <th>Total Pengeluaran</th>
                <th>Sisa Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sumberDanas as $i => $sd)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $sd->nama_sumber }}</td>
                <td>{{ number_format($sd->total_penerimaan, 0, ',', '.') }}</td>
                <td>{{ number_format($sd->total_pengeluaran, 0, ',', '.') }}</td>
                <td>{{ number_format($sd->saldo, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
