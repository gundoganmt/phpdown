<?php
namespace App\Classes;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Classes\Utils;

class Vlive
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
            'source' => 'Vlive',
        ]);
        $video->save();
        
        foreach ($meta['formats'] as $m){
            $token = Str::random(16);
            if(array_key_exists('filesize', $m)){
                $filesize = $m['filesize'];
            }
            else{
                $filesize = Utils::getSize($m['url']);
            }
            if($m['protocol'] == 'http'){
                $videoStreams->push([
                    'resolution' => Str::of($m['format_id'])->explode('_')[1],
                    'filesize' => Utils::convertFileSize($filesize),
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