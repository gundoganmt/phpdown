<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Classes\Youtube;
use App\Classes\Facebook;
use App\Classes\Twitter;
use App\Classes\Instagram;
use App\Classes\Tiktok;
use App\Classes\Vimeo;
use App\Classes\Reddit;
use App\Classes\Vlive;
use App\Classes\Tedtalk;
use App\Classes\Izlesene;
use App\Classes\SoundCloud;

class ExtractorController extends Controller
{
    public function index(Request $request)
    {
        if(PHP_OS == 'Linux'){
            $binPath = __DIR__ . '/yt-dlp';
        }
        else if(PHP_OS == 'WINNT'){
            $binPath = __DIR__ . '/yt-dlp.exe';
        }
        else{
            $binPath = __DIR__ . '/yt-dlp_macos';
        }
        
        $fbcookiesPath = __DIR__ . '/fbcookies.txt';
        $vmcookiesPath = __DIR__ . '/vmcookies.txt';
        $ttcookiesPath = __DIR__ . '/ttcookies.txt';

        if(Str::contains($request->download_url, ['facebook.com', 'fb.com', 'fb.watch'])){
            $commandString = $binPath . ' ' . $request->download_url . ' --skip-download --dump-single-json --cookies ' . $fbcookiesPath;
        }
        else if(Str::contains($request->download_url, 'tiktok.com')){
            $commandString = $binPath . ' ' . $request->download_url . ' --skip-download --dump-single-json --cookies ' . $ttcookiesPath;
        }
        else if(Str::contains($request->download_url, 'vimeo.com')){
            $commandString = $binPath . ' ' . $request->download_url . ' --skip-download --dump-single-json --cookies ' . $vmcookiesPath;
        }
        else{
            $commandString = $binPath . ' ' . $request->download_url . ' --skip-download --dump-single-json';
        }

        $meta = json_decode(shell_exec($commandString), true);

        //Storage::disk('local')->put('ted.json', $metas);

        // return [
        //     'success' => true
        // ];

        // $meta = json_decode(Storage::get('vlive.json'), true);

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
        else if($meta['extractor'] == 'Reddit'){
            $rd = new Reddit();
            $data = $rd->download($meta);
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
