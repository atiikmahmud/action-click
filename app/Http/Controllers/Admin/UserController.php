<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Users';
        return view('admin.users.index', compact('title'));
    }

    public function userProfile()
    {
        $title = 'Profile';
        return view('admin.users.profile', compact('title'));
    }
}
