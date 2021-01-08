<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SETTINGS;
use Session;

class DebugController extends Controller
{
    public function dumpdata(){

        dump(SETTINGS::get('tax_value'));
        dump(SETTINGS::get('overdue_penalty'));
        dd(Session::all());
    }
    
}
