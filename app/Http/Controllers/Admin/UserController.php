<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    private string $section = 'users';

    public function index(User $user)
    {
        return view("dashboard.{$this->section}.index", [
            'products' => $user->all(),
        ]);
    }
}
