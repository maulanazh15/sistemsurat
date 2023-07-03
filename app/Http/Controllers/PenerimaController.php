<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    public function index()
    {
        $penerima = Penerima::all();

        return view('penerima.index', compact('penerima'));
    }

    public function create()
    {
        return view('penerima.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $penerima = Penerima::create($validatedData);

        return redirect()->route('penerima.index')->with('success', 'Penerima berhasil ditambahkan');
    }

    public function edit(Penerima $penerima)
    {
        return view('penerima.edit', compact('penerima'));
    }

    public function update(Request $request, Penerima $penerima)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $penerima->update($validatedData);

        return redirect()->route('penerima.index')->with('success', 'Penerima berhasil diperbarui');
    }

    public function destroy(Penerima $penerima)
    {
        $penerima->delete();

        return redirect()->route('penerima.index')->with('success', 'Penerima berhasil dihapus');
    }
}
