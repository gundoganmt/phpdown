<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proxy;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ProxyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $proxyList = Proxy::all();
        return view('admin.proxy', [
            'proxyList' => $proxyList,
            'proxy_active' => 'active'
        ]);
    }

    public function store(Request $request)
    {
        $lines = Str::of($request->proxy_list)->explode(PHP_EOL);
        foreach ($lines as $line){
            $proxyParts = Str::of($line)->explode(':');
            $px = Proxy::create([
                'type' => $request->proxy_type,
                'ip' => $proxyParts[0],
                'port' => $proxyParts[1],
                'username' => $proxyParts[2],
                'password' => $proxyParts[3]
            ]);

            $px->save();
        }
        
        return back();
    }

    public function checkProxy()
    {
        try{
            $response = Http::timeout(3)->withOptions([
                'proxy' => 'http://voaszbzh:7wblnlew11xc@45.142.28.83:8094'
            ])->get('https://reqbin.com/echo/get/json');
        }
        catch(\GuzzleHttp\Exception\RequestException $e){
            return [
                "success" => "false"
            ];
        }

        return $response;
    }

}