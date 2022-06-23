<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;

class Tiktok
{
    public function download($meta)
    {
        $videoStreams = array();
        $audioStreams = array();

        $video = Video::create([
            'title' => Str::substr($meta['title'], 0, 200),
            'web_url' => $meta['webpage_url'],
            'thumbnail' => $meta['thumbnail'],
            'source' => 'Tiktok',
        ]);
        $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if($m['resolution'] && count($videoStreams) == 0){
                $videoStreams[] = [
                    'resolution' => $m['resolution'],
                    'filesize' => '15.8 MB',
                    'ext' => 'mp4',
                    'token' => $token   
                ];
            }
            else if(!$m['resolution'] && count($audioStreams) == 0){
                $audioStreams[] = [
                    'resolution' => 'audio',
                    'filesize' => '15.8 MB',
                    'ext' => 'mp3',
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
            'video_streams' => $videoStreams,
            'audio_streams' => $audioStreams
        ];

        return $context;
    }
}