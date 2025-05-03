<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Eager load relasi untuk efisiensi
        $penjualans = PenjualanModel::with('user')->get();
        return view('penjualan.index', compact('penjualans'))->with('activeMenu', 'penjualan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = UserModel::all();
        return view('penjualan.create', compact('users'))->with('activeMenu', 'penjualan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:m_user,user_id',
            'penjualan_kode' => 'required|unique:t_penjualan,penjualan_kode',
            'pembeli' => 'required|string|max:20',
            'penjualan_tanggal' => 'required|date',
        ]);

        PenjualanModel::create($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenjualanModel $penjualan): View
    {
        $penjualan->load('user', 'penjualanDetails.barang'); // Eager load relasi
        return view('penjualan.show', compact('penjualan'))->with('activeMenu', 'penjualan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenjualanModel $penjualan): View
    {
        $penjualan->load('user');
        $users = UserModel::all();
        return view('penjualan.edit', compact('penjualan', 'users'))->with('activeMenu', 'penjualan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenjualanModel $penjualan): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:m_user,user_id',
            'penjualan_kode' => 'required|unique:t_penjualan,penjualan_kode,' . $penjualan->penjualan_id . ',penjualan_id',
            'pembeli' => 'required|string|max:20',
            'penjualan_tanggal' => 'required|date',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenjualanModel $penjualan): RedirectResponse
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}