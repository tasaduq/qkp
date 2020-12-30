<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use Session;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderStatus;
use App\Models\OrderProducts;
use App\Models\OrderInstallments;
use App\Models\OrderInstallmentsStatus;
use DB;
use Mail;

class EMAILER
{

    public static function send($type, $status, $data, $user=null, $admin = false){

        if( $type == "INSTALLMENT") {
            $table = "installment_status_emails";
            $statusid = "installment_status_id"; 
        }
        else if( $type == "ORDER") {
            $table = "order_status_emails";
            $statusid = "order_status_id";
        }
        else if( $type == "PRODUCT") {
            $table = "product_status_emails";
            $statusid = "product_status_id";
        }
        $table = "email_templates";

        $emailTemplate = DB::table($table)->where('status',$status)->where('admin','0')->first();


        // if( array_diff(explode(",",$emailTemplate->flags), $data) ){
        //     $res = "We need vaues for: ".$emailTemplate->flags;
        //     dd($res);   
        // }
        
        $parsedEmail = SELF::parse($emailTemplate, $data);

        $sender['toEmail'] = $user->email;
        $sender['toSubject'] = $emailTemplate->subject;
        // return $parsed;

        

        Mail::send([], [], function ($message) use ($sender, $parsedEmail) {
            $message->to($sender['toEmail']);
            $message->subject($sender['toSubject']);
            $message->setBody($parsedEmail, 'text/html');;
        });
        

        if($admin == true){
            // $emailTemplate = DB::table($table)->where($table.'.'.$statusid,$status)->where('admin','1')->leftJoin('emails', 'emails.code', '=', $table.'.email_code')->first();
            $emailTemplate = DB::table($table)->where('status',$status)->where('admin','1')->first();
            
            $parsedEmail = SELF::parse($emailTemplate, $data);
            $sender['toEmail'] = env('ADMIN_EMAIL');
            $sender['toSubject'] = $emailTemplate->subject;

            Mail::send([], [], function ($message) use ($sender, $parsedEmail) {
                $message->to($sender['toEmail']);
                $message->subject($sender['toSubject']);
                $message->setBody($parsedEmail, 'text/html');;
            });
        }
        
    }
    public static function parse($emailTemplate, $data){
        return $parsedEmail = preg_replace_callback('/{{(.*?)}}/', function ($matches) use ($data) {
            list($shortCode, $index) = $matches;
            if (isset($data[$index])) {
                return $data[$index];
            } else {
                // throw new Exception("Shortcode {$shortCode} not found in template id {$this->id}", 1);
            }
        }, $emailTemplate->email);
    }
}