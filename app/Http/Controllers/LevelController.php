<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = LevelModel::all();
        $activeMenu = 'level';
        return view('level.index', compact('levels', 'activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'level';
        return view('level.create', compact('activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|max:10|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100',
        ]);

        LevelModel::create($request->all());

        return redirect()->route('level.index')->with('success', 'Data Level berhasil ditambahkan.');
    }

    public function show(LevelModel $level)
    {
        $activeMenu = 'level';
        return view('level.show', compact('level', 'activeMenu'));
    }

    public function edit(LevelModel $level)
    {
        $activeMenu = 'level';
        return view('level.edit', compact('level', 'activeMenu'));
    }

    public function update(Request $request, LevelModel $level)
    {
        $request->validate([
            'level_kode' => 'required|string|max:10|unique:m_level,level_kode,' . $level->level_id . ',level_id',
            'level_nama' => 'required|string|max:100',
        ]);

        $level->update($request->all());

        return redirect()->route('level.index')->with('success', 'Data Level berhasil diubah.');
    }

    public function destroy(LevelModel $level)
    {
        $level->delete();

        return redirect()->route('level.index')->with('success', 'Data Level berhasil dihapus.');
    }
}
