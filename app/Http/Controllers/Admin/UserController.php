<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

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
        $request->validate([
            'name'      => 'required|string|min:5|max:100',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|string|regex:/(01)[0-9]{9}/|max:11|min:10|unique:users',
            'role'      => 'required',
            'address'   => 'string|max:255',
            'state'     => 'string|max:50',
            'zip_code'  => 'string|max:10',
            'status'    => 'required',
            'password'  => 'required|string|min:8|confirmed',
            'image'     => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->role     = $request->role;
        $user->address  = $request->address;
        $user->state    = $request->state;
        $user->zip_code = $request->zip_code;
        $user->status   = $request->status;
        $user->password = Hash::make($request->password);

        $current_timestamp = Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
            if (File::exists(public_path('admin-assets/img/avatars') . '/' . $user->image)) {
                File::delete(public_path('admin-assets/img/avatars') . '/' . $user->image);
            }

            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->extension();
            $image->move(public_path('admin-assets/img/avatars'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }
}
