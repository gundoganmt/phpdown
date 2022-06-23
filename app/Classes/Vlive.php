<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Vlive
{
    public function download($meta)
    {
        $videoStreams = array();
        $imageName = Str::random(16) . '.jpg';

        $contents = file_get_contents($meta['thumbnail']);
        Storage::disk('public')->put($imageName, $contents);

        $thumbnail = '/images/' . $imageName;

        $video = Video::create([
            'title' => $meta['title'],
            'web_url' => $meta['webpage_url'],
            'thumbnail' => $thumbnail,
            'source' => 'Vlive',
        ]);
        $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if($m['protocol'] == 'http'){
                $videoStreams[] = [
                    'resolution' => Str::of($m['format_id'])->explode('_')[1],
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
            'thumbnail' => $thumbnail,
            'title' => $meta['title'],
            'video_streams' => $videoStreams      
        ];

        return $context;
    }
}