<?php


namespace App\Traits;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

trait HasGetUnavailableTimesAndMastersTrait
{
    /**
     * @return Collection
     */
    public function getUnavailableTimesAndMasters(): Collection
    {
        $masters = DB::table('masters')
            ->where('status', 'ACTIVE')
            ->select('id')
            ->get()->pluck('id')->toArray();

        return DB::table('orders')
            ->whereIn('orders.master_id', $masters)
            ->join('users', 'users.master_id', '=', 'orders.master_id')
            ->whereNotNull('users.master_id')

            ->select('orders.id AS order_id',
                'users.master_id',
                'users.name AS master_name',
                'orders.order_time')->get();
    }
}
