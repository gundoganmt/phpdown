<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;

class SoundCloud
{
    public function download($meta)
    {
        $audioStreams = array();

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
                $audioStreams[] = [
                    'resolution' => 'audio',
                    'filesize' => '15.8 MB',
                    'ext' => 'mp4',
                    'token' => $token   
                ];
            }

            $video->resolutions()->create([
                'download_url' => $m['url'],
                'ext' => $m['ext'],
                'token' => $token
            ]);
        };

        $context = [
            'error' => false,
            'duration' => 'Duration: ' . '10',
            'thumbnail' => $meta['thumbnail'],
            'title' => $meta['title'],
            'audio_streams' => $audioStreams      
        ];

        return $context;
    }
}