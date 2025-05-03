<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use App\Models\SupplierModel; // Import SupplierModel
use Illuminate\Http\Request;
use Illuminate\View\View;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Eager load relasi untuk efisiensi
        $stoks = StokModel::with(['barang', 'user', 'supplier'])->get();
        return view('stok.index', compact('stoks'))->with('activeMenu', 'stok');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $barangs = BarangModel::all();
        $users = UserModel::all();
        $suppliers = SupplierModel::all(); // Fetch suppliers
        return view('stok.create', compact('barangs', 'users', 'suppliers'))->with('activeMenu', 'stok');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'user_id' => 'required|exists:m_user,user_id',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:m_supplier,supplier_id', // Validate supplier_id
        ]);

        StokModel::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StokModel $stok): View
    {
        $stok->load(['barang', 'user', 'supplier']);
        return view('stok.show', compact('stok'))->with('activeMenu', 'stok');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StokModel $stok): View
    {
        $stok->load(['barang', 'user', 'supplier']);
        $barangs = BarangModel::all();
        $users = UserModel::all();
        $suppliers = SupplierModel::all(); // Fetch suppliers
        return view('stok.edit', compact('stok', 'barangs', 'users', 'suppliers'))->with('activeMenu', 'stok');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StokModel $stok)
    {
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'user_id' => 'required|exists:m_user,user_id',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:m_supplier,supplier_id', // Validate supplier_id
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StokModel $stok)
    {
        $stok->delete();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus.');
    }
}
