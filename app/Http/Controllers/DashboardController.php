<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Penerimaan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Total Penerimaan
        $totalPenerimaan = Penerimaan::sum('nominal');

        // Total Pengeluaran
        $totalPengeluaran = Pengeluaran::sum('nominal');

        // Sisa Saldo (otomatis penerimaan - pengeluaran)
        $sisaSaldo = $totalPenerimaan - $totalPengeluaran;

        // Jumlah kegiatan aktif
        $jumlahKegiatan = Kegiatan::count();

        return view('dashboard', compact(
            'totalPenerimaan',
            'totalPengeluaran',
            'sisaSaldo',
            'jumlahKegiatan'
        ));
    }
}
