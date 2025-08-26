<x-app-layout>
<div class="container">
    <h3>Daftar Penerimaan per Sumber Dana</h3>

    <a href="{{ route('penerimaan-sumber-dana.create') }}" class="btn btn-primary mb-3">
        + Tambah Penerimaan
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Sumber Dana</th>
                <th>Uraian</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penerimaans as $p)
            <tr>
                <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $p->sumberDana->nama_sumber }}</td>
                <td>{{ $p->uraian }}</td>
                <td>{{ number_format($p->nominal, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data penerimaan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
