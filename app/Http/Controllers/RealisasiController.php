<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use Illuminate\Http\Request;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $sumberDanas = SumberDana::with(['penerimaanSumberDanas', 'pengeluarans'])
            ->when($bulan || $tahun, function ($query) use ($bulan, $tahun) {
                $query->where(function ($q) use ($bulan, $tahun) {
                    $q->whereHas('penerimaanSumberDanas', function ($q2) use ($bulan, $tahun) {
                        if ($bulan) $q2->whereMonth('tanggal', $bulan);
                        if ($tahun) $q2->whereYear('tanggal', $tahun);
                    })->orWhereHas('pengeluarans', function ($q2) use ($bulan, $tahun) {
                        if ($bulan) $q2->whereMonth('tanggal', $bulan);
                        if ($tahun) $q2->whereYear('tanggal', $tahun);
                    });
                });
            })
            ->get()
            ->map(function ($sd) use ($bulan, $tahun) {
                // Hitung penerimaan per sumber dana
                $total_penerimaan = $sd->penerimaanSumberDanas()
                    ->when($bulan, fn($q) => $q->whereMonth('tanggal', $bulan))
                    ->when($tahun, fn($q) => $q->whereYear('tanggal', $tahun))
                    ->sum('nominal'); // <-- pastikan kolomnya

                $total_pengeluaran = $sd->pengeluarans()
                    ->when($bulan, fn($q) => $q->whereMonth('tanggal', $bulan))
                    ->when($tahun, fn($q) => $q->whereYear('tanggal', $tahun))
                    ->sum('nominal'); // <-- pastikan kolomnya


                // Tambahkan properti baru
                $sd->total_penerimaan = $total_penerimaan;
                $sd->total_pengeluaran = $total_pengeluaran;
                $sd->saldo = $total_penerimaan - $total_pengeluaran;

                return $sd;
            });

            
         
        return view('laporan_realisasi.index', compact('sumberDanas', 'bulan', 'tahun'));
    }








    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
{
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    $sumberDana = SumberDana::with(['pengeluarans' => function ($query) use ($bulan, $tahun) {
        if ($bulan) {
            $query->whereMonth('tanggal', $bulan);
        }
        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }
         $query->with('kegiatan')->orderBy('tanggal', 'desc');
    }])->findOrFail($id);

    $pengeluarans = $sumberDana->pengeluarans;
    $totalPengeluaran = $pengeluarans->sum('nominal');

    return view('laporan_realisasi.show', compact('sumberDana', 'pengeluarans', 'totalPengeluaran', 'bulan', 'tahun'));
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
