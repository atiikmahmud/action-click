<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photos;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Photos';
        $search = $request->query('search');
        $photos = Photos::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")->orWhere('tag', 'LIKE', "%{$search}%");
        })->with('user')->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.photos.index', compact('title', 'photos', 'search'));
    }

    public function addPhoto()
    {
        $title = 'Upload New Photo';
        return view('admin.photos.add-photo', compact('title'));
    }

    public function storePhoto(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|min:3|max:100',
            'tag'       => 'required|string|min:3|max:100',
            'image'     => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        $photo = new Photos();
        $photo->name     = $request->name;
        $photo->tag    = $request->tag;

        $current_timestamp = Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->name . '_' . $current_timestamp . '.' . $image->extension();
            $image->move(public_path('admin-assets/img/photos'), $imageName);
            $photo->image = $imageName;
        }

        $photo->save();

        return redirect()->route('admin.photos.index')->with('success', 'Photo uploaded successfully!');
    }

    public function photoApproved($id)
    {
        $photo = Photos::find($id);
        $photo->status = 'approved';
        $photo->save();

        return redirect()->back()->with('success', 'Photo approved successfully!');
    }

    public function photoRejected($id)
    {
        $photo = Photos::find($id);
        $photo->status = 'rejected';
        $photo->save();

        return redirect()->back()->with('success', 'Photo rejected successfully!');
    }

    public function photoFeatured($id)
    {
        $photo = Photos::find($id);
        if ($photo->featured == 0) {
            $photo->featured = 1;
            $photo->save();
            return redirect()->back()->with('success', 'Photo has been featured!');
        } else {
            $photo->featured = 0;
            $photo->save();
            return redirect()->back()->with('success', 'Photo has been removed from featured photo!');
        }
    }
}
