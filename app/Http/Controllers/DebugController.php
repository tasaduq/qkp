<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class DebugController extends Controller
{
    public function dumpdata(){
        dd(Session::all());
    }
    
}
