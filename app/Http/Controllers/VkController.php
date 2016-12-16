<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VkController extends Controller
{
    public function index(Request $request)
    {
        $request->input();
        return $request->all();
    }
}
