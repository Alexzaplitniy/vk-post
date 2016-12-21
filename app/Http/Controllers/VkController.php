<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;

class VkController extends Controller
{
    public function index(Request $request){
    	dd($request->all());
    }
    
    public function save(Request $request){
        $url = __DIR__ . 'text1.txt';
        file_put_contents($url, $request->all());
    }
}
