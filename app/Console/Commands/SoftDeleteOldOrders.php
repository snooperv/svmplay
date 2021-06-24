<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SoftDeleteOldOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:delete:old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft deletes all old orders from orders_table';

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
        $currentTime = Carbon::now();
        $oldOrders = Order::query()
            ->where('order_time', '<', $currentTime)
            ->get();
        foreach ($oldOrders as $oldOrder) {
            $oldOrder->delete();
        }
        return 0;
    }
}
