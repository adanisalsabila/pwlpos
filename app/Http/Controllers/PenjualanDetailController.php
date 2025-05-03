<?php

namespace App\Http\Controllers;

use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $penjualanDetails = PenjualanDetailModel::with(['penjualan', 'barang'])->get();
        return view('penjualan_detail.index', compact('penjualanDetails'))->with('activeMenu', 'penjualandetail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $penjualans = PenjualanModel::all();
        $barangs = BarangModel::all();
        return view('penjualan_detail.create', compact('penjualans', 'barangs'))->with('activeMenu', 'penjualandetail');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'penjualan_id' => 'required|exists:t_penjualan,penjualan_id',
            'barang_id' => 'required|exists:m_barang,barang_id',
            'harga' => 'required|integer|min:0',
            'jumlah' => 'required|integer|min:1',
        ]);

        PenjualanDetailModel::create($request->all());

        return redirect()->route('penjualan-detail.index')->with('success', 'Detail penjualan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenjualanDetailModel $penjualanDetail): View
    {
        $penjualanDetail->load(['penjualan', 'barang']);
        return view('penjualan_detail.show', compact('penjualanDetail'))->with('activeMenu', 'penjualandetail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenjualanDetailModel $penjualanDetail): View
    {
        $penjualanDetail->load(['penjualan', 'barang']);
        $penjualans = PenjualanModel::all();
        $barangs = BarangModel::all();
        return view('penjualan_detail.edit', compact('penjualanDetail', 'penjualans', 'barangs'))->with('activeMenu', 'penjualandetail');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenjualanDetailModel $penjualanDetail): RedirectResponse
    {
        $request->validate([
            'penjualan_id' => 'required|exists:t_penjualan,penjualan_id',
            'barang_id' => 'required|exists:m_barang,barang_id',
            'harga' => 'required|integer|min:0',
            'jumlah' => 'required|integer|min:1',
        ]);

        $penjualanDetail->update($request->all());

        return redirect()->route('penjualan-detail.index')->with('success', 'Detail penjualan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenjualanDetailModel $penjualanDetail): RedirectResponse
    {
        $penjualanDetail->delete();

        return redirect()->route('penjualan-detail.index')->with('success', 'Detail penjualan berhasil dihapus.');
    }

    public function getBarangHarga($barangId)
    {
        $barang = BarangModel::findOrFail($barangId); // Eager load
        return response()->json(['harga' => $barang->harga_jual]);
    }
}
