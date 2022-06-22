<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Classes\Youtube;
use App\Classes\Facebook;
use App\Classes\Twitter;
use App\Classes\Vimeo;
use App\Classes\Izlesene;
use App\Classes\SoundCloud;

class ExtractorController extends Controller
{
    public function index(Request $request)
    {
        //error_log($request->inputValue);
        // $binPath = __DIR__ . '/../../../yt-dlp.exe';
        // $fbcookiesPath = __DIR__ . '/fbcookies.txt';
        // $vmcookiesPath = __DIR__ . '/vmcookies.txt';
        // //$commandString = $binPath . ' ' . $request->inputValue . ' --skip-download --dump-single-json --cookies ' . $vmcookiesPath;
        // $commandString = $binPath . ' ' . $request->inputValue . ' --skip-download --dump-single-json';

        // $metas = shell_exec($commandString);

        // Storage::disk('local')->put('soundcloud.json', $metas);

        $meta = json_decode(Storage::get('soundcloud.json'), true);

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
        else if($meta['extractor'] == 'vimeo'){
            $vm = new Vimeo();
            $data = $vm->download($meta);
        }
        else if($meta['extractor'] == 'soundcloud'){
            $sc = new SoundCloud();
            $data = $sc->download($meta);
        }
        else if($meta['extractor'] == 'Izlesene'){
            $iz = new Izlesene();
            $data = $iz->download($meta);
        }
        
        else{
            $data = [
                'error' => false
            ];
        }

        return $data;
    }

}
