<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $dwList = ['youtube', 'twitter', 'facebook', 'instagram', 'reddit', 'tedtalk', 'tiktok', 
            'vlive', 'vimeo', 'soundcloud', 'izlesene'];
        if(request('downloader') && !Str::contains(request('downloader'), $dwList)){
            abort(404);
        }

        return view('home', [
            'dw' => request('downloader'),
            'faqs' => Faq::all()
        ]);
    }
}
