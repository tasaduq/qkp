<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SETTINGS;
use Session;

class DebugController extends Controller
{
    public function dumpdata(){
        dump("settings");
        dump(SETTINGS::get('tax_value'));
        dump(SETTINGS::get('overdue_penalty'));
        dump("session");
        dump(Session::all());
        dump("env");
        dump(env('admin_emails_email'));
        dd("end")
    }
    
}
