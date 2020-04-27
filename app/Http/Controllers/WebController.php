<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function districts()
    {
        return view('districts.index');
    }
}
