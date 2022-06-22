<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $url = 'https://video.twimg.com/ext_tw_video/1455967267452243969/pu/vid/640x352/-BHwb_BI7c2c2SSu.mp4?tag=12';
        header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.'video'.'-'.time().'.'.'mp4'.'"');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . $deJson->size);
		header('Connection: Close');
		ob_clean();
		flush();
		readfile($deJson->url);
		exit;
    }
}
