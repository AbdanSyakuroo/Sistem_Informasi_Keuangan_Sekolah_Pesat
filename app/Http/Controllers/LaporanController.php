<?php

namespace App\Http\Controllers;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
public function index(Request $request)
{
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    // === Ambil data penerimaan (penerimaans) ===
    $pemasukan = DB::table('penerimaans')
        ->select(
            'penerimaans.tanggal',
            'penerimaans.uraian',
            'penerimaans.nominal as penerimaan',
            DB::raw('NULL as pengeluaran'),
            DB::raw('NULL as kode_kegiatan'),
            DB::raw('NULL as nama_sumber')
        );

    if ($bulan) $pemasukan->whereMonth('penerimaans.tanggal', $bulan);
    if ($tahun) $pemasukan->whereYear('penerimaans.tanggal', $tahun);

    // === Ambil data pengeluaran ===
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

    if ($bulan) $pengeluaran->whereMonth('pengeluarans.tanggal', $bulan);
    if ($tahun) $pengeluaran->whereYear('pengeluarans.tanggal', $tahun);

    // === Gabungan pemasukan & pengeluaran ===
    $laporan = $pemasukan
        ->unionAll($pengeluaran)
        ->orderBy('tanggal', 'asc')
        ->get();

    // === Hitung saldo berjalan ===
    $saldo = 0;
    foreach ($laporan as $item) {
        $penerimaan  = $item->penerimaan ?? 0;
        $pengeluar   = $item->pengeluaran ?? 0;
        $saldo += $penerimaan - $pengeluar;
        $item->saldo = $saldo;
    }

    // === Data kegiatan ===
    $kegiatan = DB::table('pengeluarans')
        ->join('kegiatans', 'pengeluarans.kegiatan_id', '=', 'kegiatans.id')
        ->select('kegiatans.kode_kegiatan', 'kegiatans.nama_kegiatan')
        ->when($bulan, fn($q) => $q->whereMonth('pengeluarans.tanggal', $bulan))
        ->when($tahun, fn($q) => $q->whereYear('pengeluarans.tanggal', $tahun))
        ->distinct()
        ->get();

// === Data realisasi per sumber dana ===
$bulan = request('bulan') ?? date('m'); // default bulan sekarang
$tahun = request('tahun') ?? date('Y'); // default tahun sekarang

$realisasi = DB::table('sumber_danas')
    ->select(
        'sumber_danas.id',
        'sumber_danas.nama_sumber',
        DB::raw("(SELECT COALESCE(SUM(nominal),0) 
                  FROM penerimaan_danas 
                  WHERE sumber_dana_id = sumber_danas.id
                    AND MONTH(tanggal) = $bulan 
                    AND YEAR(tanggal) = $tahun
                 ) as total_penerimaan"),
        DB::raw("(SELECT COALESCE(SUM(nominal),0) 
                  FROM pengeluarans 
                  WHERE sumber_dana_id = sumber_danas.id
                    AND MONTH(tanggal) = $bulan 
                    AND YEAR(tanggal) = $tahun
                 ) as total_pengeluaran")
    )
    ->get()
    ->map(function ($item) {
        $item->saldo = $item->total_penerimaan - $item->total_pengeluaran;
        return $item;
    });

// kirim juga ke view
return view('laporan.index', compact(
    'laporan', 'bulan', 'tahun', 'kegiatan', 'realisasi'
));
}

}
