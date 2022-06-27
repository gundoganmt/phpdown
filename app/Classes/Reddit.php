<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;
use App\Classes\Utils;

class Reddit
{
    public function download($meta)
    {
        $videoStreams = collect();
        $audioStreams = collect();

        $video = Video::create([
            'title' => Str::substr($meta['title'], 0, 200),
            'web_url' => $meta['webpage_url'],
            'thumbnail' => $meta['thumbnail'],
            'source' => 'Reddit',
        ]);
        $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if(array_key_exists('format_note', $m) && $m['format_note'] == 'DASH video'){
                $videoStreams->push([
                    'resolution' => $m['height'] . 'x' . $m['width'],
                    'filesize' => Utils::convertFileSize(Utils::getSize($m['url'])),
                    'ext' => $m['ext'],
                    'token' => $token   
                ]);
            }
            else if(array_key_exists('format_note', $m) && $m['format_note'] == 'DASH audio'){
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
            'video_streams' => $videoStreams,
            'audio_streams' => $audioStreams
        ];

        return $context;
    }
}