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


    public function show($id)
    {
        return redirect()
            ->route('pengeluarans.index')
            ->with('info', 'Fitur detail data tidak tersedia.');
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



    public function filterForm()
    {
        $sumberDanas = SumberDana::all();
        return view('pengeluarans.filter', compact('sumberDanas'));
    }

    public function bySumberDana(Request $request)
    {
        $request->validate([
            'sumber_dana_id' => 'required|exists:sumber_danas,id',
            'tanggal_mulai'  => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $pengeluaran = Pengeluaran::with(['kegiatan', 'sumberDana'])
            ->where('sumber_dana_id', $request->sumber_dana_id)
            ->when($request->filled('tanggal_mulai'), function ($query) use ($request) {
                $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
            })
            ->when($request->filled('tanggal_selesai'), function ($query) use ($request) {
                $query->whereDate('tanggal', '<=', $request->tanggal_selesai);
            })
            ->orderBy('tanggal', 'asc')
            ->get();

        // Ambil nama sumber dana langsung dari tabel sumber_danas
        $namaSumber = SumberDana::find($request->sumber_dana_id)->nama_sumber;

        return view('pengeluarans.by_sumber_dana', compact('pengeluaran', 'namaSumber'));
    }
}
