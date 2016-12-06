<?php

namespace App\Http\Controllers;

class StaticPageController extends Controller
{
    public function aboutUs()
    {
        return view('static.about-us');
    }

    public function contactUs()
    {
        return view('static.contact-us');
    }
}
