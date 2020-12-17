<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrderInstallments;
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

        $installmentsDue = OrderInstallments::where("due_date", "like", date("Y-m-d")."%")->update([
            "status" => "8"
        ]);


        $sevenDueDays = date("Y-m-d", strtotime( "+7 days", strtotime( date("Y-m-d") ) ) );


        $installmentsOverdue = OrderInstallments::where("due_date", "like", $sevenDueDays."%")->update([
           "status" => "7"
        ]);
        
        $this->info("installmentsOverdue=".$installmentsOverdue." and installmentsDue".$installmentsDue);

        return 0;
    }
}
