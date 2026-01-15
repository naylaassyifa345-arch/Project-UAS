<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // tampilkan list user
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // tampilkan form create
    public function create()
    {
        return view('admin.users.create');
    }

    // simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/users')->with('success', 'User berhasil ditambahkan');
    }

    // tampilkan form edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/admin/users')->with('success', 'User berhasil diupdate');
    }

    // hapus user
    public function destroy($id)
    {
        // cegah hapus akun sendiri
        if (auth()->id() == $id) {
            return redirect('/admin/users')
                ->with('error', 'Tidak bisa menghapus akun yang sedang login');
        }

        User::findOrFail($id)->delete();

        return redirect('/admin/users')
            ->with('success', 'User berhasil dihapus');
    }

}
