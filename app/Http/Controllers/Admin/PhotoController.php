<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photos;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Photos';
        $search = $request->query('search');
        $photos = Photos::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })->orderBy('created_at', 'ASC')->paginate(10);
        return view('admin.photos.index', compact('title', 'photos', 'search'));
    }
}
