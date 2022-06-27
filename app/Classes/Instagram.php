<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Classes\Utils;

class Instagram
{
    public function download($meta)
    {
        $videoStreams = collect();
        $imageName = Str::random(16) . '.jpg';

        $contents = file_get_contents($meta['thumbnail']);
        Storage::disk('public')->put($imageName, $contents);

        $thumbnail = '/images/' . $imageName;

        $video = Video::create([
            'title' => $meta['title'],
            'web_url' => $meta['webpage_url'],
            'thumbnail' => $thumbnail,
            'source' => 'Instagram',
        ]);
        $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if($m['ext'] == 'mp4'){
                $videoStreams->push([
                    'resolution' => $m['resolution'],
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
            'thumbnail' => $thumbnail,
            'title' => $meta['title'],
            'video_streams' => $videoStreams      
        ];

        return $context;
    }
}