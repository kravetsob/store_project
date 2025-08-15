<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view("dashboard.users.index", [
            'users' => $user->all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request, Hasher $hasher)
    {
        $user = new User();
        $user->login = $request->input('login');
        $hashedPassword = $hasher->make($request->input('password'));
        $user->password = $hashedPassword;
        $user->save();

        return redirect()->route("dashboard.users.index");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("dashboard.users.index");
    }

}
