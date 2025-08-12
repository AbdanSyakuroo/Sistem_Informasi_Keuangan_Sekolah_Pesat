<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
  public function index(Request $request)
{
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    $pemasukan = DB::table('penerimaans')
        ->select(
            'penerimaans.tanggal',
            'penerimaans.uraian',
            'penerimaans.nominal as penerimaan',
            DB::raw('NULL as pengeluaran'),
            DB::raw('NULL as kode_kegiatan'),
            DB::raw('NULL as nama_sumber')
        );

    if ($bulan) {
        $pemasukan->whereMonth('penerimaans.tanggal', $bulan);
    }
    if ($tahun) {
        $pemasukan->whereYear('penerimaans.tanggal', $tahun);
    }

    $pengeluaran = DB::table('pengeluarans')
        ->leftJoin('kegiatans', 'pengeluarans.kegiatan_id', '=', 'kegiatans.id')
        ->leftJoin('sumber_danas', 'pengeluarans.sumber_dana_id', '=', 'sumber_danas.id')
        ->select(
            'pengeluarans.tanggal',
            'pengeluarans.uraian',
            DB::raw('NULL as penerimaan'),
            'pengeluarans.nominal as pengeluaran',
            'kegiatans.kode_kegiatan',
            'sumber_danas.nama_sumber'
        );

    if ($bulan) {
        $pengeluaran->whereMonth('pengeluarans.tanggal', $bulan);
    }
    if ($tahun) {
        $pengeluaran->whereYear('pengeluarans.tanggal', $tahun);
    }

    $laporan = $pemasukan
        ->unionAll($pengeluaran)
        ->orderBy('tanggal', 'asc')
        ->get();

    $saldo = 0;
    foreach ($laporan as $item) {
        $penerimaan = $item->penerimaan ?? 0;
        $pengeluaran = $item->pengeluaran ?? 0;

        $saldo += $penerimaan - $pengeluaran;
        $item->saldo = $saldo;
    }

    return view('laporan.index', compact('laporan', 'bulan', 'tahun'));
}


    public function laporan1()
    {
        $pemasukan = DB::table('penerimaans')
            ->select(
                'penerimaans.tanggal',
                'penerimaans.uraian',
                'penerimaans.nominal as penerimaan',
                DB::raw('NULL as pengeluaran'),
                DB::raw('NULL as kode_kegiatan'),
                DB::raw('NULL as nama_sumber')
            );

        $pengeluaran = DB::table('pengeluarans')
            ->leftJoin('kegiatans', 'pengeluarans.kegiatan_id', '=', 'kegiatans.id')
            ->leftJoin('sumber_danas', 'pengeluarans.sumber_dana_id', '=', 'sumber_danas.id')
            ->select(
                'pengeluarans.tanggal',
                'pengeluarans.uraian',
                DB::raw('NULL as penerimaan'),
                'pengeluarans.nominal as pengeluaran',
                'kegiatans.kode_kegiatan',
                'sumber_danas.nama_sumber'
            );

        $laporan = $pemasukan
            ->unionAll($pengeluaran)
            ->orderBy('tanggal', 'asc')
            ->get();

        // Hitung saldo berjalan
        $saldo = 0;
        foreach ($laporan as $item) {
            $penerimaan = $item->penerimaan ?? 0;
            $pengeluaran = $item->pengeluaran ?? 0;

            $saldo += $penerimaan - $pengeluaran;
            $item->saldo = $saldo;
        }

        return view('laporan1.index', compact('laporan'));
    }
}
