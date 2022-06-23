<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Classes\Youtube;
use App\Classes\Facebook;
use App\Classes\Twitter;
use App\Classes\Instagram;
use App\Classes\Tiktok;
use App\Classes\Vimeo;
use App\Classes\Vlive;
use App\Classes\Tedtalk;
use App\Classes\Izlesene;
use App\Classes\SoundCloud;

class ExtractorController extends Controller
{
    public function index(Request $request)
    {
        //error_log($request->inputValue);
        // $binPath = __DIR__ . '/yt-dlp.exe';
        // $fbcookiesPath = __DIR__ . '/fbcookies.txt';
        // $vmcookiesPath = __DIR__ . '/vmcookies.txt';
        // $ttcookiesPath = __DIR__ . '/ttcookies.txt';
        // //$commandString = $binPath . ' ' . $request->inputValue . ' --skip-download --dump-single-json -f bestvideo+bestaudio --ffmpeg-location ' . $ffmpeglocation;
        // $commandString = $binPath . ' ' . $request->inputValue . ' --skip-download --dump-single-json';

        // $metas = shell_exec($commandString);

        // Storage::disk('local')->put('ted.json', $metas);

        // return [
        //     'success' => true
        // ];

        $meta = json_decode(Storage::get('ted.json'), true);

        if($meta['extractor'] == 'youtube'){
            $yt = new Youtube();
            $data = $yt->download($meta);
        }
        else if($meta['extractor'] == 'facebook'){
            $fb = new Facebook();
            $data = $fb->download($meta);
        }
        else if($meta['extractor'] == 'twitter'){
            $tw = new Twitter();
            $data = $tw->download($meta);
        }
        else if($meta['extractor'] == 'Instagram'){
            $ig = new Instagram();
            $data = $ig->download($meta);
        }
        else if($meta['extractor'] == 'TikTok'){
            $tt = new Tiktok();
            $data = $tt->download($meta);
        }
        else if($meta['extractor'] == 'vimeo'){
            $vm = new Vimeo();
            $data = $vm->download($meta);
        }
        else if($meta['extractor'] == 'soundcloud'){
            $sc = new SoundCloud();
            $data = $sc->download($meta);
        }
        else if($meta['extractor'] == 'vlive'){
            $vl = new Vlive();
            $data = $vl->download($meta);
        }
        else if($meta['extractor'] == 'TedTalk'){
            $ted = new Tedtalk();
            $data = $ted->download($meta);
        }
        else if($meta['extractor'] == 'Izlesene'){
            $iz = new Izlesene();
            $data = $iz->download($meta);
        }
        
        else{
            $data = [
                'error' => true
            ];
        }

        return $data;
    }

}
