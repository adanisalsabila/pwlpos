<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\SupplierModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = BarangModel::with(['kategori', 'supplier'])->get();
        return view('barang.index', compact('barangs'))->with('activeMenu', 'barang');
    }

    public function create()
    {
        $kategoris = KategoriModel::all();
        $suppliers = SupplierModel::all();
        return view('barang.create', compact('kategoris', 'suppliers'))->with('activeMenu', 'barang');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'barang_kode' => 'required|unique:m_barang,barang_kode',
            'barang_nama' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        BarangModel::create($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = BarangModel::with(['kategori', 'supplier'])->findOrFail($id);
        return view('barang.show', compact('barang'))->with('activeMenu', 'barang');
    }

    public function edit($id)
    {
        $barang = BarangModel::findOrFail($id);
        $kategoris = KategoriModel::all();
        $suppliers = SupplierModel::all();
        return view('barang.edit', compact('barang', 'kategoris', 'suppliers'))->with('activeMenu', 'barang');
    }

    public function update(Request $request, $id)
    {
        $barang = BarangModel::findOrFail($id);

        $validated = $request->validate([
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'barang_kode' => 'required|unique:m_barang,barang_kode,' . $id . ',barang_id',
            'barang_nama' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        $barang->update($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = BarangModel::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
