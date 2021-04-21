<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use DateTime;
use Session;

class CalculationController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct(){
        
    // }
    public function ensureCalculationDataInSession(){
        
        Session::put("get_feasible_installments", $this->get_feasible_installments() );
        Session::put("days_before_eid", $this->days_before_eid() );
        Session::put("months_before_eid", $this->months_before_eid() );
        Session::put("isOperational", $this->isOperational() );
        Session::put("eid_date", $this->eid_date() );
        Session::put("settings", $this->settings() );
        Session::put("days_before_eid", $this->days_before_eid() );

    }
    private function settings(){
        return DB::table("preferences")->first();
    }
    private function eid_date(){
        return DB::table("preferences")->first()->eid_date;
    }
    private function days_before_eid(){
        $fdate = $this->eid_date();
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime("Today");
        $interval = $datetime1->diff($datetime2);
        return $days = $interval->format('%a');
    }
    private function months_before_eid(){
        $fdate = $this->eid_date();
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime("Today");
        $interval = $datetime1->diff($datetime2);
        return $days = $interval->format('%m');
    }
    private function isOperational(){

       $days = $this->days_before_eid();
        return ( $days > 30 );
        
    }
    private function get_feasible_installments(){

        $days = $this->days_before_eid();
        return intval( ceil( $days / 30 ) ) - 2;
    }
    public function dumpdata(){

        $data =  array(
            "get_feasible_installments" => $this->get_feasible_installments(),
            "days_before_eid" => $this->days_before_eid(),
            "months_before_eid" => $this->months_before_eid(),
            "isOperational" => $this->isOperational(),
            "eid_date" => $this->eid_date(),
            "days_before_eid" => $this->days_before_eid(),
            "from_session" => Session::all(),
        );
        dd($data);
    }
}
