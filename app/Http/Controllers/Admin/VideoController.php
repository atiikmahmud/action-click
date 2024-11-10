<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Videos';
        $search = $request->query('search');
        $videos = Video::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")->orWhere('tag', 'LIKE', "%{$search}%");
        })->with('user')->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.videos.index', compact('title', 'videos', 'search'));
    }

    public function addVideo()
    {
        $title = 'Upload New Video';
        return view('admin.videos.add-video', compact('title'));
    }

    public function storeVideo(Request $request)
    {
        // dd($request->all());
        
        $request->validate([
            'name'      => 'required|string|min:3|max:100',
            'tag'       => 'required|string|min:3|max:100',
            'video'     => 'required|mimes:mp4,mov,avi,wmv|max:20480'
        ]);

        $video = new Video();
        $video->name     = $request->name;
        $video->tag      = $request->tag;
        $video->user_id  = Auth::id();

        $current_timestamp = Carbon::now()->timestamp;
        
        if ($request->hasFile('video')) {
            $videofile = $request->file('video');
            $videoName = $request->name . '_' . $current_timestamp . '.' . $videofile->extension();
            $videofile->move(public_path('admin-assets/img/videos'), $videoName);
            $video->video = $videoName;
        }

        $video->save();

        return redirect()->route('admin.videos.index')->with('success', 'Video uploaded successfully!');
    }

    public function videoApproved($id)
    {
        $video = Video::find($id);
        $video->status = 'approved';
        $video->save();

        return redirect()->back()->with('success', 'Video approved successfully!');
    }

    public function videoRejected($id)
    {
        $video = Video::find($id);
        $video->status = 'rejected';
        $video->save();

        return redirect()->back()->with('success', 'Video rejected successfully!');
    }

    public function videoFeatured($id)
    {
        $video = Video::find($id);
        if ($video->featured == 0) {
            $video->featured = 1;
            $video->save();
            return redirect()->back()->with('success', 'Video has been featured!');
        } else {
            $video->featured = 0;
            $video->save();
            return redirect()->back()->with('success', 'Video has been removed from featured video!');
        }
    }
}
