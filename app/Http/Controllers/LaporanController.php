<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan') ?? date('m');
        $tahun = $request->input('tahun') ?? date('Y');

        /**
         * ==========================
         * 1. Data Penerimaan Harian
         * ==========================
         */
        $pemasukan = DB::table('penerimaans')
            ->select(
                'penerimaans.tanggal',
                'penerimaans.uraian',
                'penerimaans.nominal as penerimaan',
                DB::raw('NULL as pengeluaran'),
                DB::raw('NULL as kode_kegiatan'),
                DB::raw('NULL as nama_sumber')
            )
            ->when($bulan, fn($q) => $q->whereMonth('penerimaans.tanggal', $bulan))
            ->when($tahun, fn($q) => $q->whereYear('penerimaans.tanggal', $tahun));

        /**
         * ==========================
         * 2. Data Pengeluaran
         * ==========================
         */
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
            )
            ->when($bulan, fn($q) => $q->whereMonth('pengeluarans.tanggal', $bulan))
            ->when($tahun, fn($q) => $q->whereYear('pengeluarans.tanggal', $tahun));

        /**
         * ==========================
         * 3. Gabungan Laporan (Saldo Berjalan)
         * ==========================
         */
        $laporan = $pemasukan
            ->unionAll($pengeluaran)
            ->orderBy('tanggal', 'asc')
            ->get();

        $saldo = 0;
        foreach ($laporan as $item) {
            $penerimaan  = $item->penerimaan ?? 0;
            $pengeluar   = $item->pengeluaran ?? 0;
            $saldo += $penerimaan - $pengeluar;
            $item->saldo = $saldo;
        }

        /**
         * ==========================
         * 4. Data Kegiatan
         * ==========================
         */
        $kegiatan = DB::table('pengeluarans')
            ->join('kegiatans', 'pengeluarans.kegiatan_id', '=', 'kegiatans.id')
            ->select('kegiatans.kode_kegiatan', 'kegiatans.nama_kegiatan')
            ->when($bulan, fn($q) => $q->whereMonth('pengeluarans.tanggal', $bulan))
            ->when($tahun, fn($q) => $q->whereYear('pengeluarans.tanggal', $tahun))
            ->distinct()
            ->get();

        /**
         * ==========================
         * 5. Realisasi Per Sumber Dana
         * ==========================
         */
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

        /**
         * ==========================
         * 6. Realisasi Per Kegiatan (Matrix)
         * ==========================
         */
        $sumberDanas = DB::table('sumber_danas')->pluck('nama_sumber')->toArray();

        $realisasiKegiatanFlat = DB::table('pengeluarans')
            ->join('kegiatans', 'pengeluarans.kegiatan_id', '=', 'kegiatans.id')
            ->join('sumber_danas', 'pengeluarans.sumber_dana_id', '=', 'sumber_danas.id')
            ->select(
                'kegiatans.kode_kegiatan',
                'kegiatans.nama_kegiatan',
                'sumber_danas.nama_sumber',
                DB::raw('SUM(pengeluarans.nominal) as total_realisasi')
            )
            ->when($bulan, fn($q) => $q->whereMonth('pengeluarans.tanggal', $bulan))
            ->when($tahun, fn($q) => $q->whereYear('pengeluarans.tanggal', $tahun))
            ->groupBy('kegiatans.kode_kegiatan', 'kegiatans.nama_kegiatan', 'sumber_danas.nama_sumber')
            ->orderBy('kegiatans.kode_kegiatan')
            ->get();

        $realisasiKegiatan = [];
        foreach ($realisasiKegiatanFlat as $row) {
            $kode = $row->kode_kegiatan;
            if (!isset($realisasiKegiatan[$kode])) {
                $realisasiKegiatan[$kode] = [
                    'kode_kegiatan' => $row->kode_kegiatan,
                    'nama_kegiatan' => $row->nama_kegiatan,
                ];
                foreach ($sumberDanas as $sumber) {
                    $realisasiKegiatan[$kode][$sumber] = 0;
                }
                $realisasiKegiatan[$kode]['total'] = 0;
            }

            $realisasiKegiatan[$kode][$row->nama_sumber] = $row->total_realisasi;
            $realisasiKegiatan[$kode]['total'] += $row->total_realisasi;
        }
        $realisasiKegiatan = array_values($realisasiKegiatan);

        /**
         * ==========================
         * Return ke View
         * ==========================
         */
        return view('laporan.index', compact(
            'laporan',
            'bulan',
            'tahun',
            'kegiatan',
            'realisasi',
            'sumberDanas',
            'realisasiKegiatan'
        ));
    }
}
