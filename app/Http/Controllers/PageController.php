<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }

    public function termsOfUse()
    {
        return view('pages.terms-of-use');
    }

    public function adsDisclosure()
    {
        return view('pages.ads-disclosure');
    }
}
