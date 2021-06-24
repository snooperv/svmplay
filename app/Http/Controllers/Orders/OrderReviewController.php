<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\HasGetUnavailableTimesAndMastersTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderReviewController extends Controller
{
    use HasGetUnavailableTimesAndMastersTrait;

    public function index($orderId) {
        $order = DB::table('orders')
            ->where('id', $orderId)
            ->first();
        if ($order->user_id != Auth::id() && Auth::user()->role != 'ADMIN') {
            //Сделать редикрект
            return view('You shall not pass!');
        }
        $unavailableOrders = $this->getUnavailableTimesAndMasters();
        return view('updateOrder', ['order' => $order,
            'unavailableOrders' => $unavailableOrders]);
    }

    public function update(Request $request, $orderId) {
        $order = DB::table('orders')
            ->where('id', $orderId)
            ->first();
        if ($order->user_id != Auth::id() && Auth::user()->role != 'ADMIN') {
            //Сделать редикрект
            return view('You shall not pass!');
        }
        $order['master_id'] = $request->masterId;
        $order['comment'] = $request->comment;
        $order['order_time'] = $request->date;
        $order->save();
    }

    public function delete(Request $request, $orderId)
    {
        $orderId = intval($orderId);
        $order = Order::query()
            ->where('id', $orderId)
            ->first();
        if ($order->user_id != Auth::id() && Auth::user()->role != 'ADMIN') {
            //Сделать редикрект
            return view('You shall not pass!');
        }
        $order->delete();
        return view('OrderSuccessfullyDeleted', ['orderId' => $orderId]);
    }
}
