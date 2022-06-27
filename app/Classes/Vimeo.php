<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;
use App\Classes\Utils;

class Vimeo
{
    public function download($meta)
    {
        $videoStreams = collect();

        $video = Video::create([
            'title' => $meta['title'],
            'web_url' => $meta['webpage_url'],
            'thumbnail' => $meta['thumbnail'],
            'source' => 'Vimeo',
        ]);
        $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if(array_key_exists('protocol', $m) && $m['protocol'] == 'https'){
                $videoStreams->push([
                    'resolution' => Str::of($m['format_id'])->explode('-')[1],
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
            'video_streams' => $videoStreams      
        ];

        return $context;
    }
}