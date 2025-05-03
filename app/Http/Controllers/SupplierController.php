<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = SupplierModel::all();
        // Pass 'activeMenu' to the view
        return view('supplier.index', compact('data'))->with('activeMenu', 'supplier');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Pass 'activeMenu' to the view
        return view('supplier.create')->with('activeMenu', 'supplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_kode' => 'required|unique:m_supplier,supplier_kode|max:20',
            'supplier_nama' => 'required|max:100',
            'alamat' => 'nullable',
            'telepon' => 'nullable|max:20',
            'email' => 'nullable|email|unique:m_supplier,email',
        ]);

        SupplierModel::create($validated);

        return redirect()->route('supplier.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $supplier = SupplierModel::findOrFail($id);
        // Pass 'activeMenu' to the view
        return view('supplier.show', compact('supplier'))->with('activeMenu', 'supplier');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $supplier = SupplierModel::findOrFail($id);
        // Pass 'activeMenu' to the view
        return view('supplier.edit', compact('supplier'))->with('activeMenu', 'supplier');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $supplier = SupplierModel::findOrFail($id);

        $validated = $request->validate([
            'supplier_kode' => 'required|max:20|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
            'supplier_nama' => 'required|max:100',
            'alamat' => 'nullable',
            'telepon' => 'nullable|max:20',
            'email' => 'nullable|email|unique:m_supplier,email,' . $id . ',supplier_id',
        ]);

        $supplier->update($validated);

        return redirect()->route('supplier.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supplier = SupplierModel::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Data berhasil dihapus.');
    }
}
