<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;
use App\Classes\Utils;

class Facebook
{
    public function download($meta)
    {
        $videoStreams = collect();
        $videoWithoutSound = collect();
        $audioStreams = collect();

        // $video = Video::create([
        //     'title' => Str::substr($meta['title'], 0, 200),
        //     'web_url' => $meta['webpage_url'],
        //     'thumbnail' => $meta['thumbnail'],
        //     'source' => 'Facebook',
        // ]);
        // $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if(array_key_exists('quality', $m)){
                if($m['quality'] == 0 || $m['quality'] == 1){
                    $videoStreams->push([
                        'resolution' => $m['quality'] == 0 ? 'SD' : 'HD',
                        'filesize' => Utils::convertFileSize(Utils::getSize($m['url'])),
                        'ext' => $m['ext'],
                        'token' => $token   
                    ]);
                }
            }
            else if($m['acodec'] == 'none' && $m['vcodec'] != 'none'){
                $videoWithoutSound->push([
                    'resolution' => $m['resolution'],
                    'filesize' => Utils::convertFileSize(Utils::getSize($m['url'])),
                    'ext' => $m['ext'],
                    'token' => $token   
                ]);
            }
            else if($m['acodec'] != 'none' && $m['vcodec'] == 'none'){
                $audioStreams->push([
                    'resolution' => 'audio',
                    'filesize' => Utils::convertFileSize(Utils::getSize($m['url'])),
                    'ext' => $m['ext'],
                    'token' => $token   
                ]);
            }

            // $video->resolutions()->create([
            //     'download_url' => $m['url'],
            //     'ext' => $m['ext'],
            //     'token' => $token
            // ]);
        };

        $context = [
            'error' => false,
            'duration' => 'Duration: ' . date('H:i:s', $meta['duration']),
            'thumbnail' => $meta['thumbnail'],
            'title' => $meta['title'],
            'video_streams' => $videoStreams,
            'video_without_sound' => $videoWithoutSound,
            'audio_streams' => $audioStreams
        ];

        return $context;
    }
}