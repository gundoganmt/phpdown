<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;

class Youtube
{
    public function download($meta)
    {
        $videoStreams = array();
        $videoWithoutSound = array();
        $audioStreams = array();

        $video = Video::create([
            'title' => Str::substr($meta['title'], 0, 200),
            'web_url' => $meta['webpage_url'],
            'thumbnail' => $meta['thumbnail'],
            'source' => 'Youtube',
        ]);
        $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if($m['acodec'] != 'none' && $m['vcodec'] != 'none'){
                $videoStreams[] = [
                    'resolution' => $m['format_note'],
                    'filesize' => '15.8 MB',
                    'ext' => 'mp4',
                    'token' => $token   
                ];
            }
            else if($m['acodec'] == 'none' && $m['vcodec'] != 'none'){
                $videoWithoutSound[] = [
                    'resolution' => $m['format_note'],
                    'filesize' => '15.8 MB',
                    'ext' => 'mp4',
                    'token' => $token   
                ];
            }
            else if($m['acodec'] != 'none' && $m['vcodec'] == 'none'){
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
            'video_streams' => $videoStreams,
            'video_without_sound' => $videoWithoutSound,
            'audio_streams' => $audioStreams
        ];

        return $context;
    }
}