<?php

namespace App\Http\Controllers;

use App\Contracts\UrlCheckerInterface;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(UrlCheckerInterface $urlChecker): View
    {
        return view('pages.home');
    }
}
