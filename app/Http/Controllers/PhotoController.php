<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $title = 'Photos';
        return view('photos.index', compact('title'));
    }

    public function photoDetails($id)
    {
        $photo = Photos::with('user')->where('id', $id)->first();
        $view = 1;
        $photo->view_count += $view; 
        $photo->save();
        $title = $photo->name . ' - Photo Details';
        $related_photos = Photos::where('id', '!=', '$photo->id')->take(8)->get();
        return view('photos.photo-details', compact('title', 'photo', 'related_photos'));
    }
}
