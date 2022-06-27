<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;
use App\Classes\Utils;

class Tiktok
{
    public function download($meta)
    {
        $videoStreams = collect();
        $audioStreams = collect();

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
                $videoStreams->push([
                    'resolution' => $m['resolution'],
                    'filesize' => Utils::convertFileSize($m['filesize']),
                    'ext' => $m['ext'],
                    'token' => $token   
                ]);
            }
            else if(!$m['resolution'] && count($audioStreams) == 0){
                $audioStreams->push([
                    'resolution' => 'audio',
                    'filesize' => Utils::convertFileSize($m['filesize']),
                    'ext' => 'mp3',
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
            'video_streams' => $videoStreams,
            'audio_streams' => $audioStreams
        ];

        return $context;
    }
}