<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $title = 'Videos';
        return view('videos.index', compact('title'));
    }

    public function videoDetails()
    {
        $title = 'Video Details';
        return view('videos.video-details', compact('title'));
    }
}
