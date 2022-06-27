<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;
use App\Classes\Utils;

class SoundCloud
{
    public function download($meta)
    {
        $audioStreams = collect();

        $video = Video::create([
            'title' => $meta['title'],
            'web_url' => $meta['webpage_url'],
            'thumbnail' => $meta['thumbnail'],
            'source' => 'SoundCloud',
        ]);
        $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if($m['protocol'] == 'http'){
                $audioStreams->push([
                    'resolution' => 'audio',
                    'filesize' => Utils::convertFileSize(Utils::getSize($m['url'])),
                    'ext' => $m['ext'],
                    'token' => $token   
                ]);
            }

            $video->resolutions()->create([
                'download_url' => $m['url'],
                'ext' => $m['ext'],
                'token' => $token
            ]);
        };

        $context = [
            'error' => false,
            'duration' => 'Duration: ' . date('H:i:s', $meta['duration']),
            'thumbnail' => $meta['thumbnail'],
            'title' => $meta['title'],
            'audio_streams' => $audioStreams      
        ];

        return $context;
    }
}