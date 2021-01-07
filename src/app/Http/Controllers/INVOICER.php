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
use PDF;

class INVOICER
{

    public static function generate($type, $record, $status){

      
        $invoice_template = DB::table("invoice_templates")->where('type',$type)->where('status',$status)->first();
        
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        $invoice = SELF::parse($invoice_template, $record);
        $filename = 'invoice_'.$record->id.'.pdf';
        $path = storage_path('app\invoices\\'.$filename);
        // dd();
        PDF::loadHTML($invoice)->save($path);
        return array("path"=>$filename);
        // return PDF::loadHTML('<h1>Test</h1>')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');


    }
    public static function parse($template, $data){
        return $parsedTemplate = preg_replace_callback('/{{(.*?)}}/', function ($matches) use ($data) {
            list($shortCode, $index) = $matches;
            if (isset($data[$index])) {
                return $data[$index];
            } else {
                // throw new Exception("Shortcode {$shortCode} not found in template id {$this->id}", 1);
            }
        }, $template->template);
    }
}