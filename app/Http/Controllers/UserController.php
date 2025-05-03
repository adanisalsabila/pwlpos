<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::with('level')->get();
        return view('user.index', [
            'users' => $users,
            'activeMenu' => 'user'
        ]);
    }

    public function create()
    {
        $levels = LevelModel::all();
        return view('user.create', [
            'levels' => $levels,
            'activeMenu' => 'user'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required|exists:m_level,level_id',
            'username' => 'required|string|max:20|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|string|min:6',
        ]);

        UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show(UserModel $user)
    {
        $user->load('level');
        return view('user.show', [
            'user' => $user,
            'activeMenu' => 'user'
        ]);
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $levels = LevelModel::all();
        return view('user.edit', [
            'user' => $user,
            'levels' => $levels,
            'activeMenu' => 'user'
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $request->validate([
            'level_id' => 'required|exists:m_level,level_id',
            'username' => 'required|string|max:20|unique:m_user,username,' . $user->user_id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->only(['level_id', 'username', 'nama']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diubah.');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
