<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $data['list_user'] = User::all();
        return view('user.index', $data);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $user = new User();
        $user->nama = request('nama');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect('admin/user')->with('success', 'user berhasil di tambahkan');
    }

    public function show(User $user)
    {
        $data['user'] = $user;
        return view('user.show', $data);
    }

    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('user.edit', $data);
    }


    public function update(User $user)
    {
        $user->nama = request('nama');
        $user->username = request('username');
        $user->email = request('email');
        if(request('password'))$user->password = bcrypt(request('password'));
        $user->save();

        return redirect('admin/user')->with('success', 'user berhasil di edit');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/user')->with('danger', 'user berhasil di hapus');
    }
}
