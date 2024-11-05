<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $title = 'Photos';
        return view('photos.index', compact('title'));
    }

    public function photoDetails()
    {
        $title = 'Photo Details';
        return view('photos.photo-details', compact('title'));
    }
}
