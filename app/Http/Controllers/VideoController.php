<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $title = 'Videos';
        return view('videos.index', compact('title'));
    }

    public function videoDetails($id)
    {
        $video = Video::with('user')->where('id', $id)->first();
        $view = 1;
        $video->view_count += $view;
        $video->save();
        $title = 'Video Details';
        $related_videos = Video::whereNotIn('id', [$video->id])->whereNotIn('tag',[$video->tag])->orderByRaw('RAND()')->take(8)->get();
        return view('videos.video-details', compact('title', 'video', 'related_videos'));
    }
}
