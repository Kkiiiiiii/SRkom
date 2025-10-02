<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //

      public function index(Request $request)
    {
        $search = $request->input('search');
        $user = User::query();
        if ($search) {
            $user->where('role', 'like', "%{$search}%");
        }
        $user = $user->paginate(10);
        return view('admin.user', compact('user'));
    }

    public function create()
    {
        return view('admin.userCreate');
    }

    public function store(Request $request)
    {    
            $request->validate([
                'username' => 'required|string|max:100|unique:user,username',
                'password' => 'required|string|max:6',
                'role'     => 'required|string',
            ]);

            User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role'     => $request->role,
            ]);
            return redirect()->route('admin.User')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail(Crypt::decrypt($id));
        return view('admin.userEdit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail(Crypt::decrypt($id));

        $request->validate([
            'username' => 'required|string|max:100|unique:user,username,' . $user->id . ',id',
            'role'     => 'required|string',
        ]);

        $data = [
            'username' => $request->username,
            'role'     => $request->role,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.User')->with('success', 'User berhasil diupdate');
    }

    public function delete($id)
    {
        $user = User::findOrFail(Crypt::decrypt($id));
        $user->delete();
        return redirect()->route('admin.User')->with('success', 'User berhasil dihapus');
    }
}
