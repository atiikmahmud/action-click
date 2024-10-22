<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        return view('index', compact('title'));
    }

    public function photoDetails()
    {
        $title = 'Photo Details';
        return view('photo-details', compact('title'));
    }
}
