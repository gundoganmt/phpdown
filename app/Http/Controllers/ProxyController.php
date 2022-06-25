<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proxy;
use Illuminate\Support\Str;

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
            'proxyList' => $proxyList
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
}

// 152.101.100.150:888:maho:pass
// 102.111.120.150:120:sulo:word
// 172.101.140.104:455:camo:just
// 202.201.100.150:410:haso:password