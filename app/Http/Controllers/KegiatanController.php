<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->paginate(10);
        return view('kegiatans.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('kegiatans.create');
    }

    public function show($id)
    {
        return redirect()
            ->route('kegiatans.index')
            ->with('info', 'Fitur detail data tidak tersedia.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode_kegiatan' => 'required|string|max:50|unique:kegiatans,kode_kegiatan',
            'nama_kegiatan' => 'required|string|max:255',
        ]);

        Kegiatan::create($request->only('kode_kegiatan', 'nama_kegiatan'));

        return redirect()->route('kegiatans.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatans.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'kode_kegiatan' => 'required|string|max:50|unique:kegiatans,kode_kegiatan,' . $kegiatan->id,
            'nama_kegiatan' => 'required|string|max:255',
        ]);

        $kegiatan->update($request->only('kode_kegiatan', 'nama_kegiatan'));

        return redirect()->route('kegiatans.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatans.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}
