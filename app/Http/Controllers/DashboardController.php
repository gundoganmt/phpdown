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
        $dw_date = Video::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        });

        for($i=0; $i < $dw_date->count(); $i++){
            $data[] = $dw_date->values()[$i]->count();
        }

        $total_today = $data[count($data)-1] ? $data[count($data)-1]  : 0;
        $total_yesterday = $data[count($data)-2] ? $data[count($data)-2]  : 0;

        $total_one_week = array_sum(array_slice($data, -7));
        $total_two_weeks = array_sum(array_slice($data, -14));

        $total_one_month = array_sum(array_slice($data, -30));
        $total_two_months = array_sum(array_slice($data, -60));

        $last_month = $total_two_months - $total_one_month;
        $last_week = $total_two_weeks - $total_one_week;
        $rate_month = 0;
        $rate_week = 0;
        $rate_today = 0;

        if(!$last_month == 0){
            $rate_month = 100*($total_one_month-$last_month)/$last_month;
        }
        if(!$last_week == 0){
            $rate_week = 100*($total_one_week-$last_week)/$last_week;
        }
        if(!$total_yesterday == 0){
            $rate_today = 100*($total_today-$total_yesterday)/$total_yesterday;
        }

        $dw_source = Video::orderBy('created_at')->get()->groupBy(function($data) {
            return $data->source;
        });

        $sources = ['Youtube', 'Facebook', 'Twitter', 'Instagram', 
            'Tiktok', 'Reddit', 'TedTalk', 'Vlive', 'Vimeo', 'SoundCloud', 'Izlesene'];

        foreach($sources as $source){
            $found = false;
            foreach($dw_source->toArray() as $key => $value){
                if($source == $key){
                    $source_data[] = count($value);
                    $found = true;
                }
            }
            if(!$found){
                $source_data[] = 0;
            }
        }

        return view('admin.dashboard', [
            'dates' => $dw_date->keys(),
            'data' => $data,
            'total_today' => $total_today,
            'total_one_week' => $total_one_week,
            'total_one_month' => $total_one_month,
            'rate_today' => $rate_today,
            'rate_week' => $rate_week,
            'rate_month' => $rate_month,
            'total_downloads' => array_sum($data),
            'source_data' => $source_data,
            'dash_active' => 'active'
        ]);
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
