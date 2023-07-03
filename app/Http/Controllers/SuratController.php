<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use App\Models\Penerima;
use App\Models\Pengirim;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::all();
        return view('surat.index', compact('surat'));
    }

    public function create()
    {
        $pengirim = Pengirim::all();
        $penerima = Penerima::all();
        $kategori = Kategori::all();
        return view('surat.create', compact('pengirim', 'penerima','kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'pengirim_id' => 'required',
            'penerima_id' => 'required',
            'kategori_id' => 'required',
        ]);

        Surat::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'pengirim_id' => $request->pengirim_id,
            'penerima_id' => $request->penerima_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan.');
    }

    public function edit(Surat $surat)
    {
        $pengirim = Pengirim::all();
        $penerima = Penerima::all();
        $kategori = Kategori::all();
        return view('surat.edit', compact('surat', 'pengirim', 'penerima', 'kategori'));
    }

    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'pengirim_id' => 'required',
            'penerima_id' => 'required',
            'kategori_id' => 'required',
        ]);

        $surat->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'pengirim_id' => $request->pengirim_id,
            'penerima_id' => $request->penerima_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy(Surat $surat)
    {
        $surat->delete();
        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }
}

