<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihans = Pelatihan::latest()->get();
        return view('pelatihans.index', compact('pelatihans'));
    }

    public function show($id)
{
    $pelatihan = Pelatihan::findOrFail($id);
    return view('pelatihans.show', compact('pelatihan'));
}


    public function create()
    {
        return view('pelatihans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'nullable|string',
            'akademi' => 'nullable|string',
            // dst... (boleh tambahkan validasi lebih detail nanti)
        ]);

        Pelatihan::create($request->all());
        return redirect()->route('pelatihans.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Pelatihan $pelatihan)
    {
        return view('pelatihans.edit', compact('pelatihan'));
    }

    public function update(Request $request, Pelatihan $pelatihan)
    {
        $pelatihan->update($request->all());
        return redirect()->route('pelatihans.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();
        return redirect()->route('pelatihans.index')->with('success', 'Data berhasil dihapus!');
    }
}

