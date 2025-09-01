<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use Illuminate\Http\Request;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sumberDanas = SumberDana::with(['penerimaanSumberDanas', 'pengeluarans'])->get();

        return view('laporan_realisasi.index', compact('sumberDanas'));
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
public function show(string $id)
{
    // Ambil sumber dana beserta pengeluarannya
    $sumberDana = SumberDana::with('pengeluarans')->findOrFail($id);

    // Hitung total pengeluaran
    $totalPengeluaran = $sumberDana->pengeluarans->sum('jumlah');

    // Kirim ke view
    return view('laporan_realisasi.show', compact('sumberDana', 'totalPengeluaran'));
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
