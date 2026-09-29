<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Tampil data
    public function index()
    {
        $data_mahasiswa = Mahasiswa::all();
        return view('viewmahasiswa', compact('data_mahasiswa'));
    }

    // Form tambah
    public function create()
    {
        return view('createmahasiswa');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'npm'        => 'required|unique:mahasiswa,npm',
            'nama'       => 'required',
            'prodi'      => 'required',
            'tahunmasuk' => 'required',
        ]);

        Mahasiswa::create([
            'npm'        => $request->npm,
            'nama'       => $request->nama,
            'prodi'      => $request->prodi,
            'tahunmasuk' => $request->tahunmasuk,
        ]);

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data berhasil ditambahkan.');
    }

    // Detail (tidak dipakai)
    public function show(string $id)
    {
        //
    }

    // Form edit
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('editmahasiswa', compact('mahasiswa'));
    }

    // Update data
    public function update(Request $request, string $id)
    {
        $request->validate([
            'npm'        => 'required|unique:mahasiswa,npm,' . $id,
            'nama'       => 'required',
            'prodi'      => 'required',
            'tahunmasuk' => 'required',
        ]);

        Mahasiswa::findOrFail($id)->update([
            'npm'        => $request->npm,
            'nama'       => $request->nama,
            'prodi'      => $request->prodi,
            'tahunmasuk' => $request->tahunmasuk,
        ]);

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data berhasil diupdate.');
    }

    // Hapus data
    public function destroy(string $id)
    {
        Mahasiswa::findOrFail($id)->delete();

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data berhasil dihapus.');
    }
}