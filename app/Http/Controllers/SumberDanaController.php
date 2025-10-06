<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use Illuminate\Http\Request;

class SumberDanaController extends Controller
{
    /**
     * Tampilkan daftar sumber dana
     */
    public function index()
    {
        $sumberDana = SumberDana::latest()->paginate(10);
        return view('sumber_dana.index', compact('sumberDana'));
    }

    /**
     * Form tambah sumber dana
     */

    public function show($id)
    {
        return redirect()
            ->route('sumber_dana.index')
            ->with('info', 'Fitur detail data tidak tersedia.');
    }


    public function create()
    {
        return view('sumber_dana.create');
    }

    /**
     * Simpan sumber dana baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sumber' => 'required|string|',
        ]);

        SumberDana::create($request->only('nama_sumber'));

        return redirect()->route('sumber_dana.index')
            ->with('success', 'Sumber dana berhasil ditambahkan.');
    }

    /**
     * Form edit sumber dana
     */
    public function edit(SumberDana $sumber_dana)
    {
        return view('sumber_dana.edit', compact('sumber_dana'));
    }

    /**
     * Update sumber dana
     */

    public function update(Request $request, SumberDana $sumber_dana)
    {
        $request->validate([
            'nama_sumber' => 'required|string',
        ]);

        $sumber_dana->update($request->only('nama_sumber'));

        return redirect()->route('sumber_dana.index')
            ->with('success', 'Sumber dana berhasil diperbarui.');
    }

    /**
     * Hapus sumber dana
     */

    public function destroy(SumberDana $sumber_dana)
    {
        $sumber_dana->delete();

        return redirect()->route('sumber_dana.index')
            ->with('success', 'Sumber dana berhasil dihapus.');
    }
}
