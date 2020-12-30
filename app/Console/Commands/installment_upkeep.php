<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrderInstallments;
use App\Http\Controllers\INVOICER;
use DB;

class installment_upkeep extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'installments:upkeep';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'marks installment payments for due and overdue payments';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $installmentsDue = OrderInstallments::where("due_date", "like", date("Y-m-d")."%")->get();
       
        DB::beginTransaction();
        try {
            // $records = OrderInstallments::take(2)->get();
            // $records = $installmentsDue->get();
            foreach($installmentsDue as $key => $record) {
                $invoice = INVOICER::generate("INSTALLMENT", $record, "8");
                // dd("a");
                $record->update([
                    "status" => "8",
                    "invoice" => $invoice['path'],
                ]);
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            dd($e);
        } catch(Exception $e) {
            // dd("c");
            DB::rollback();
        }

        // generate an invoice for the due isntallments
        
        


        
        /* TODO: Send emails for due installments
        foreach ($installmentsDue->get() as $key => $value) {
            $data = array(
                "amount" => $installment->amount,
                "tax" => $installment->after_tax_amount - $installment->amount,
                "after_tax_amount" => $installment->after_tax_amount,
                "due_date" => $installment->due_date
            );

            $user = Auth::user();
            
            EMAILER::send("INSTALLMENT", "8", $data, $user, true);

        }
        */

        $sevenDueDays = date("Y-m-d", strtotime( "+7 days", strtotime( date("Y-m-d") ) ) );


        $installmentsOverdue = OrderInstallments::where("due_date", "like", $sevenDueDays."%")->get();
        // ->update([
        //    "status" => "7"
        // ]);
        

        DB::beginTransaction();
        try {
            $installmentsOverdue = OrderInstallments::take(2)->get();
            // $records = $installmentsDue->get();
            foreach($installmentsOverdue as $key => $record) {
                $invoice = INVOICER::generate("INSTALLMENT", $record, "7");
                // dd("a");
                $record->update([
                    "status" => "7",
                    "invoice" => $invoice['path'],
                ]);
            }
            DB::commit();
        } catch(\Exception $e) {    
            DB::rollback();
            dd($e);
        } catch(Exception $e) {
            // dd("c");
            DB::rollback();
        }

        
        /* TODO: Send emails for overdue installments
        foreach ($installments as $key => $value) {
            $data = array(
                "amount" => $installment->amount,
                "tax" => $installment->after_tax_amount - $installment->amount,
                "after_tax_amount" => $installment->after_tax_amount,
                "due_date" => $installment->due_date
            );

            $user = Auth::user();
            
            EMAILER::send("INSTALLMENT", $installment->status, $data, $user, true);

        }
        */

        


        $this->info("installmentsOverdue=".$installmentsOverdue." and installmentsDue".$installmentsDue);

        return 0;
    }
}
