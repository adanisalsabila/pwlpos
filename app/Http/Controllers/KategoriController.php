<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriModel::all();
        return view('kategori.index', [
            'kategori' => $kategori,
            'activeMenu' => 'kategori'
        ]);
    }

    public function create()
    {
        return view('kategori.create', [
            'activeMenu' => 'kategori'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required|string|max:100',
        ]);

        KategoriModel::create($request->only(['kategori_kode', 'kategori_nama']));
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.show', [
            'kategori' => $kategori,
            'activeMenu' => 'kategori'
        ]);
    }

    public function edit($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', [
            'kategori' => $kategori,
            'activeMenu' => 'kategori'
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::findOrFail($id);

        $request->validate([
            'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100',
        ]);

        $kategori->update($request->only(['kategori_kode', 'kategori_nama']));
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah.');
    }

    public function destroy($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
