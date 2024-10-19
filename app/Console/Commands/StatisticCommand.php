<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class StatisticCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistic:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new statistic';

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
        DB::table('statistic')->insert(
            array(
                'Date' => '2022-07-14',
                'Sale' => 2,
                'Quantity' => 3,
                'QtyBill' => 4,
                'created_at' => now(),
                'updated_at' => now()
            )
        );
    }
}
