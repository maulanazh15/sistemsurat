<?php

namespace App\Http\Controllers;

use App\Models\Pengirim;
use Illuminate\Http\Request;

class PengirimController extends Controller
{
    public function index()
    {
        $pengirim = Pengirim::all();

        return view('pengirim.index', compact('pengirim'));
    }

    public function create()
    {
        return view('pengirim.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $pengirim = Pengirim::create($validatedData);

        return redirect()->route('pengirim.index')->with('success', 'Pengirim berhasil ditambahkan');
    }

    public function edit(Pengirim $pengirim)
    {
        return view('pengirim.edit', compact('pengirim'));
    }

    public function update(Request $request, Pengirim $pengirim)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $pengirim->update($validatedData);

        return redirect()->route('pengirim.index')->with('success', 'Pengirim berhasil diperbarui');
    }

    public function destroy(Pengirim $pengirim)
    {
        $pengirim->delete();

        return redirect()->route('pengirim.index')->with('success', 'Pengirim berhasil dihapus');
    }
}
