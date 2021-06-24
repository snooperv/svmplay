<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Master;
use App\Models\Order;
use App\Traits\HasGetUnavailableTimesAndMastersTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MakeOrderController extends Controller
{
    use HasGetUnavailableTimesAndMastersTrait;
    public function index() {
        $unavailableOrders = $this->getUnavailableTimesAndMasters();
        return view('makeOrder', ['unavailableOrders' => $unavailableOrders]);
    }

    public function store(Request $request) {
        $order = Order::create([
            'order_date' => $request->date,
            'order_time' => $request->time,
            'user_id' => Auth::id(),
            'master_id' => $request->masterId,
            'comment' => $request->comment,
        ]);
        return view('orderMadeSuccessfully', ['order_id' => $order->id]);
    }
}
