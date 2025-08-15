<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(User $user)
    {
        return view("dashboard.users.index", [
            'users' => $user->all(),
        ]);
    }

    /**
     * Show the form for creating a new user.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store created user in storage.
     * @param Request $request
     * @param Hasher $hasher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Hasher $hasher)
    {
        $user = new User();
        $user->login = $request->input('login');
        $hashedPassword = $hasher->make($request->input('password'));
        $user->password = $hashedPassword;
        $user->save();

        return redirect()->route("dashboard.users.index");
    }

    /**
     * Remove user.
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("dashboard.users.index");
    }

}
