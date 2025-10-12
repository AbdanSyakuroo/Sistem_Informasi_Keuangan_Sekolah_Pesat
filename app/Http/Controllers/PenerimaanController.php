<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
public function index()
{
    $penerimaans = Penerimaan::orderBy('tanggal', 'desc')->paginate(10);
    return view('penerimaans.index', compact('penerimaans'));
}


    public function create()
    {
        return view('penerimaans.create');
    }

        public function show($id)
    {
        return redirect()
            ->route('penerimaans.index')
            ->with('info', 'Fitur detail data tidak tersedia.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
        ]);

        Penerimaan::create($request->only('tanggal', 'uraian', 'nominal'));

        return redirect()->route('penerimaans.index')
                         ->with('success', 'Penerimaan berhasil ditambahkan.');
    }

    public function edit(Penerimaan $penerimaan)
    {
        return view('penerimaans.edit', compact('penerimaan'));
    }

    public function update(Request $request, Penerimaan $penerimaan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
        ]);

        $penerimaan->update($request->only('tanggal', 'uraian', 'nominal'));

        return redirect()->route('penerimaans.index')
                         ->with('success', 'Penerimaan berhasil diperbarui.');
    }

    public function destroy(Penerimaan $penerimaan)
    {
        $penerimaan->delete();

        return redirect()->route('penerimaans.index')
                         ->with('success', 'Penerimaan berhasil dihapus.');
    }
}
