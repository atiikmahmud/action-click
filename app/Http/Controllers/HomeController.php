<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $featured_photos = Photos::where('featured', true)->orderBy('updated_at', 'DESC')->take(8)->get();
        return view('index', compact('title', 'featured_photos'));
    }
}