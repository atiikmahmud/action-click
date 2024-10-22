<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function termsAndConditions()
    {
        $title = 'Terms & Conditions';
        return view('others.termsandconditions', compact('title'));
    }

    public function privacyPolicy()
    {
        $title = 'Privacy Policy';
        return view('others.privacy-policy', compact('title'));
    }
}
