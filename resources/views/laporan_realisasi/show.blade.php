@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Detail Pengeluaran - {{ $sumberDana->nama }}</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Uraian</th>
                <th>Nominal Pengeluaran</th>
                <th>Kode Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sumberDana->pengeluarans as $index => $pengeluaran)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pengeluaran->uraian ?? '-' }}</td>
                    <td>Rp {{ number_format($pengeluaran->nominal, 0, ',', '.') }}</td>
                    <td>{{ $pengeluaran->kode_kegiatan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data pengeluaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('realisasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
