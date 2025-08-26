<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanDana;
use App\Models\SumberDana;
use Illuminate\Http\Request;

class PenerimaanDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerimaans = PenerimaanDana::with('sumberDana')->orderBy('tanggal', 'desc')->get();

        return view('penerimaan_sumber_dana.index', compact('penerimaans'));
    }

    public function create()
    {
        $sumberDanas = SumberDana::all();
        return view('penerimaan_sumber_dana.create', compact('sumberDanas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sumber_dana_id' => 'required|exists:sumber_danas,id',
            'tanggal' => 'required|date',
            'uraian' => 'nullable|string',
            'nominal' => 'required|numeric|min:0',
        ]);

        PenerimaanDana::create($request->all());

        return redirect()->route('penerimaan-sumber-dana.index')
                         ->with('success', 'Penerimaan per sumber dana berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerimaanDana $penerimaanDana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerimaanDana $penerimaanDana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenerimaanDana $penerimaanDana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerimaanDana $penerimaanDana)
    {
        //
    }
}
