<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Users';
        $users = User::orderBy('created_at', 'ASC')->paginate(10);
        return view('admin.users.index', compact('title', 'users'));
    }

    public function userProfile()
    {
        $title = 'Your Profile';
        $user = User::find(Auth()->user()->id);
        return view('admin.users.profile', compact('title', 'user'));
    }

    public function userAvatarsRemove($id)
    {
        $user = User::find($id);
        if (File::exists(public_path('admin-assets/img/avatars') . '/' . $user->image)) {
            File::delete(public_path('admin-assets/img/avatars') . '/' . $user->image);
        }
        $user->image = null;
        $user->save();

        return redirect()->back()->with('success', 'Your avatar removed successfully!');
    }

    public function userDisable(Request $request)
    {
        $user = User::find($request->id);
        $user->status = 'disabled';
        $user->save();
        
        return redirect()->back();
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

    public function userProfileUpdate(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|min:5|max:100',
            'phone'     => 'required|string|regex:/(01)[0-9]{9}/|max:11|min:10|unique:users,phone,' . Auth::user()->id,
            'address'   => 'max:255',
            'state'     => 'max:50',
            'zip_code'  => 'max:10',
            'image'     => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;

        if (!empty($request->c_password)) {

            $request->validate([
                'c_password' => 'required|string|min:8',
                'new_password' => 'required|string|min:8',
                'con_password' => 'required|string|min:8'
            ]);

            if (Hash::check($request->c_password, auth()->user()->password)) {

                if (!empty($request->new_password) && !empty($request->con_password)) {
                    if ($request->new_password == $request->con_password) {
                        $user->password = Hash::make($request->con_password);
                    } else {
                        return redirect()->back()->with('error', 'New Password & Confirm Password does not match !');
                    }
                } else {
                    return redirect()->back()->with('error', 'New Password & Confirm Password is must be fillup !');
                }
            } else {
                return redirect()->back()->with('error', 'Current Password is not correct !');
            }
        }

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

        return redirect()->back()->with('success', 'Your profile updated successfully!');
    }
}
