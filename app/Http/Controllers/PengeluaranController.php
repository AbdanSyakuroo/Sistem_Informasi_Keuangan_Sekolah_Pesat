<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Kegiatan;
use App\Models\SumberDana;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::with(['kegiatan', 'sumberDana'])
            ->latest()
            ->paginate(10);
        return view('pengeluarans.index', compact('pengeluarans'));
    }

    public function create()
    {
        $kegiatans = Kegiatan::all();
        $sumberDanas = SumberDana::all();
        return view('pengeluarans.create', compact('kegiatans', 'sumberDanas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'sumber_dana_id' => 'required|exists:sumber_danas,id',
            'nominal' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'uraian' => 'nullable|string|max:255',
        ]);

        Pengeluaran::create($request->only('kegiatan_id', 'sumber_dana_id', 'uraian', 'nominal', 'tanggal'));
        return redirect()->route('pengeluarans.index')
            ->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        $kegiatans = Kegiatan::all();
        $sumberDanas = SumberDana::all();
        return view('pengeluarans.edit', compact('pengeluaran', 'kegiatans', 'sumberDanas'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'sumber_dana_id' => 'required|exists:sumber_danas,id',
            'nominal' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
        ]);

        $pengeluaran->update($request->only('kegiatan_id', 'sumber_dana_id', 'uraian', 'nominal', 'tanggal'));
        return redirect()->route('pengeluarans.index')
            ->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluarans.index')
            ->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
