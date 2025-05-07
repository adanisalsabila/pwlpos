<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelModel;
use Illuminate\Http\JsonResponse; // Import JsonResponse
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $levels = LevelModel::all();
        return response()->json($levels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([ // Tambahkan validasi
            'level_nama' => 'required|string|max:255',
            'level_kode' => 'required|string|max:10|unique:m_level,level_kode',
        ]);

        $level = LevelModel::create($validatedData);
        return response()->json($level, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  LevelModel  $level
     * @return JsonResponse
     */
    public function show(LevelModel $level): JsonResponse
    {
        // Eager load relasi jika ada, misalnya:
        // $level->load('relasiYangInginDiambil');
        return response()->json($level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  LevelModel  $level
     * @return JsonResponse
     */
    public function update(Request $request, LevelModel $level): JsonResponse
    {
        $validatedData = $request->validate([ // Tambahkan validasi
            'level_nama' => 'string|max:255',
            'level_kode' => 'string|max:10|unique:m_level,level_kode,' . $level->level_id . ',level_id', // PERBAIKAN SUDAH BENAR
        ]);

        $level->update($validatedData);
        return response()->json($level);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  LevelModel  $level
     * @return JsonResponse
     */
    public function destroy(LevelModel $level): JsonResponse
    {
        $level->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}