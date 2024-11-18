<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $title = 'Photos';
        $photos = Photos::orderBy('created_at', 'DESC')->get();
        return view('photos.index', compact('title', 'photos'));
    }

    public function photoDetails($id)
    {
        $photo = Photos::with('user')->where('id', $id)->first();
        $view = 1;
        $photo->view_count += $view; 
        $photo->save();
        $title = 'Photo Details';
        $related_photos = Photos::whereNotIn('id', [$photo->id])->whereNotIn('tag',[$photo->tag])->orderByRaw('RAND()')->take(8)->get();
        return view('photos.photo-details', compact('title', 'photo', 'related_photos'));
    }
}
