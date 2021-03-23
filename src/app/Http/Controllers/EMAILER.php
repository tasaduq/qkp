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

        if( env('app_env') == "local" ){
            // return true;
        }

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

        $emailTemplate = DB::table($table)->where('type',$type)->where('status',$status)->where('admin','0')->first();


        // if( array_diff(explode(",",$emailTemplate->flags), $data) ){
        //     $res = "We need vaues for: ".$emailTemplate->flags;
        //     dd($res);   
        // }
        
        
        $parsedEmail = SELF::parse($emailTemplate, $data);
        $parsedEmail = SELF::productsTable($parsedEmail, $data);
        return $parsedEmail = SELF::addEmailHeaderFooter($parsedEmail, $emailTemplate);

        $sender['toEmail'] = $user->email;
        $sender['toSubject'] = $emailTemplate->subject;
        // return $parsed;

        //return true;

        Mail::send([], [], function ($message) use ($sender, $parsedEmail) {
            $message->to($sender['toEmail']);
            $message->subject($sender['toSubject']);
            $message->setBody($parsedEmail, 'text/html');;
        });
        

        if($admin == true){
            // $emailTemplate = DB::table($table)->where($table.'.'.$statusid,$status)->where('admin','1')->leftJoin('emails', 'emails.code', '=', $table.'.email_code')->first();
            $emailTemplate = DB::table($table)->where('type',$type)->where('status',$status)->where('admin','1')->first();
            
            $parsedEmail = SELF::parse($emailTemplate, $data);
            $sender['toEmail'] = "support@qurbanikistonpay.com";//env('ADMIN_EMAIL');
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
                return "{$shortCode}";
                // throw new Exception("Shortcode {$shortCode} not found in template id {$this->id}", 1);
            }
        }, $emailTemplate->email);
    }
    public static function productsTable($parsedEmail, $data){
        
        // dd($data);
        $products_table = SELF::generateProductsTable($data);
        
        return $parsedEmail = preg_replace('/{{products_table}}/', $products_table, $parsedEmail);
    }
    public static function generateProductsTable($data){
        return view('emails.producttable')->with('order', $data);
        // return view('sections.cart-right-section')->with('products', $data->products);
        
    }
    public static function addEmailHeaderFooter($parsedEmail, $emailTemplate){

        return '<table align="center" width="650" height="483" border="0" cellpadding="4" cellspacing="0">
            <tbody style="background: #F4EFF5;">
                <tr style="background:#250036;">
                <td width="5%" height="97" bgcolor="#250036">&nbsp;</td>
                <td width="50%"><img src="https://qurbanikistonpay.com/images/logo.svg" width="70" height="70" alt=""></td>
                <td align="right" width="40%" style="color:#f0d36d; font-weight:bold; font-size:20px; font-family: arial;">'.$emailTemplate->subject.'</td>
                <td width="5%">&nbsp;</td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td style="font-family:arial; font-size:14px;" valign="top" height="300" colspan="2">'
                    

                //listing of order products

                    .$parsedEmail.

                '</td>
                <td>&nbsp;</td>
                </tr>
                <tr height="60">
                <td style="background: #F4EFF5;">&nbsp;</td>
                <td style="background: #F4EFF5; border-top:1px dashed #000000; font-family:arial; font-size:14px;" align="center" colspan="2">&nbsp;© Copyrights 2020 Farms Wide Open (PVT).LTD. All Rights Reserved</td>
                <td style="background: #F4EFF5;">&nbsp;</td>
                </tr>
            </tbody>
            </table>';

    }
    
}