<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $title = 'User Profile';
        $user = User::find(Auth()->user()->id);
        return view('admin.users.profile', compact('title', 'user'));
    }

    public function addUser()
    {
        $title = 'Add New User';
        return view('admin.users.add-user', compact('title'));
    }

    public function storeUser(Request $request)
    {
        dd($request->all());
    }
}
