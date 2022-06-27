<?php
namespace App\Classes;

class Utils
{
    static function convertFileSize($num)
    {
        if (!$num){
            return 'unknown';
        }
        else{
            $kb = $num/1024;
            if ($kb < 1024)
              return round($kb, 2) . 'kb';
            else{
              $mb = $kb/1024;
              if ($mb < 1024)
                  return round($mb, 2) . 'mb';
              else{
                  $gb = $mb/1024;
                  return round($gb, 2) . 'gb';
              }
            }
        }
    }

    static function getSize($url)
    {
        $response = get_headers($url, true);
        if(array_key_exists('Content-Length', $response)){         
            return (double)$response['Content-Length'];
        }
        else{
            return 'Unknown';
        }
    }
}