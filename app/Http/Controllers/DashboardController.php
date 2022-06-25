<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use App\Models\Faq;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        return view('admin.dashboard');
    }

    public function latest()
    {
        $videos = Video::all();
        return view('admin.latest_downloads', [
            'videos' => $videos
        ]);
    }

    public function manageIndex()
    {
        $admins = User::all();
        return view('admin.manage_admins', [
            'admins' => $admins
        ]);
    }

    public function manageStore(Request $request)
    {
        if($request->file('profile_pic')){
            $file = $request->file('profile_pic');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
        }
        User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->full_name),
            'profile_pic' => isset($filename) ? $filename : 'profile.png'
        ]);

        return back();
    }

    public function faqIndex()
    {
        $faqs = Faq::all();
        return view('admin.faq', [
            'faqs' => $faqs
        ]);
    }

    public function faqStore(Request $request)
    {
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return back();
    }
}
